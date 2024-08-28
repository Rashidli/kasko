<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ServiceMail;
use App\Models\About;
use App\Models\Advantage;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactItem;
use App\Models\Content;
use App\Models\Faq;
use App\Models\FormField;
use App\Models\Link;
use App\Models\Main;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Single;
use App\Models\FormSubmission;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function welcome()
    {
        $mains = Main::active()->get();
        $advantages = Advantage::active()->get();
        $partners = Partner::active()->get();
        $statistics = Statistic::active()->get();
        $blogs = Blog::active()->get();
        $about = About::active()->first();
        $categories = Category::with(['services' => function($q){
            $q->orderBy('row');
        }])->orderBy('row')->get();
        return view('front.welcome', compact(
            'mains',
            'advantages',
            'partners',
            'statistics',
            'blogs',
            'about',
            'categories',
        ));
    }

    public function dynamicPage($slug)
    {
        $types = [
            'news' => 'front.news',
            'about' => 'front.about',
            'contact' => 'front.contact',
            'faq' => 'front.faq',
        ];

        foreach ($types as $type => $view) {
            $page = Single::where('type', $type)->whereHas('translations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->first();

            if ($page) {
                $routes = collect($page->getTranslationsArray())->map(fn($tr) => $tr['slug'])->toArray();
                $this->createTranslatedLinks($routes, 'dynamic.page');

                $data = [];
                switch ($type) {
                    case 'contact':
                        break;
                    case 'faq':
                        $data['faqs'] = Faq::active()->get();
                        break;
                    case 'news':
                        $data['blogs'] = Blog::active()->orderBy('id', 'asc')->get();
                        $data['new_blogs'] = Blog::active()->Where('is_new', true)->orderBy('id', 'asc')->get();
                        break;
                    case 'about':
                        $data['partners'] = Partner::active()->get();
                        $data['advantages'] = Advantage::active()->get();
                        $data['faqs'] = Faq::active()->get();
                        $data['about'] = About::active()->first();
                        break;
                }
                return view($view, $data);
            }
        }

        $models = [
            'blog' => Blog::with('translations'),
            'link' => Link::with('translations'),
            'content' => Content::with('translations'),
            'service' => Service::with('translations', 'form'),
        ];

        foreach ($models as $key => $query) {

            $item = $query->whereHas('translations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->active()->first();

            if ($item) {

                $routes = collect($item->getTranslationsArray())->map(fn($tr) => $tr['slug'])->toArray();
                $this->createTranslatedLinks($routes, 'dynamic.page');

                $viewData = [$key => $item];
                if ($key === 'blog') {
                    $viewData['blogs'] = Blog::active()->get();
                    return view('front.news_single', $viewData);
                } elseif ($key === 'link') {
                    return view('front.link_single', $viewData);
                } elseif ($key === 'service') {
                    return view('front.service_single', $viewData);
                } elseif ($key === 'content') {
                    return view('front.content_single', $viewData);
                }

            }
        }

        abort(404);

    }


    public function submit(Request $request)
    {
        $validationRules = [];

        // Loop through each field_id to build the validation rules
        foreach ($request->input('field_ids') as $fieldId) {
            $field = FormField::with('form')->findOrFail($fieldId);
            $isRequired = (bool) $field->is_required;

            if ($field->type === 'select') {
                $options = explode(',', $field->options);
                $validationRules[$field->name] = ($isRequired ? 'required|' : '') . 'in:' . implode(',', array_map('trim', $options));
            } else {
                $validationRules[$field->name] = $isRequired ? 'required' : 'nullable';
            }
        }

        $request->validate($validationRules);

        $formData = $request->except(['_token', 'field_ids']);

        $data = FormSubmission::create([
            'data' => json_encode($formData),
            'title' => $field->form->title, // Assuming $field is the last one used in the loop, use any field related to the form
            'form_id' => $field->form->id
        ]);

        Mail::to('test@kasko.az')->send(new ServiceMail($data));

        return redirect()->route('success');
    }





    public function success()
    {
        return view('front.success');
    }

    public function contact_post(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'phone' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->phone = $request->prefix . $request->phone;
        $contact->save();

        return redirect()->route('success');

    }

    public function sigorta_qanunu()
    {
        return view('front.sigorta_qanun');
    }
    public function dovlet_qulluqculari()
    {
        return view('front.dovlet_qulluqculari');
    }
    public function icbari_sigorta_qanun()
    {
        return view('front.icbari_sigorta_qanun');
    }
    public function inzibati_xetalar_mecellesi()
    {
        return view('front.inzibati_xetalar_mecellesi');
    }
    public function tibbi_sigorta_qanun()
    {
        return view('front.tibbi_sigorta_qanun');
    }

    public function kasko_qanun(){
        return view('front.kasko_qanun');
    }

    public function sigorta_beledcisi(){
        return view('front.sigorta_beledcisi');
    }
}
