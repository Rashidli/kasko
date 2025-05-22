<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ServiceMail;
use App\Models\About;
use App\Models\Advantage;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogView;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Content;
use App\Models\Faq;
use App\Models\FormField;
use App\Models\FormSubmission;
use App\Models\Insurance;
use App\Models\Link;
use App\Models\Main;
use App\Models\Map;
use App\Models\MessageSchedule;
use App\Models\Partner;
use App\Models\Prefix;
use App\Models\Service;
use App\Models\ShareIcon;
use App\Models\Single;
use App\Models\Statistic;
use App\Services\Calculate;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $calculate;

    public function __construct(Calculate $calculate)
    {
        $this->calculate = $calculate;
    }

    public function calculate_kasko(Request $request)
    {
        $bazar_deyeri      = $request->bazar_deyeri;
        $teminat           = $request->teminat;
        $azad_olma_meblegi = $request->azad_olma_meblegi;

        $result = $this->calculate->calculate_kasko($teminat, $bazar_deyeri, $azad_olma_meblegi);

        return response()->json(['result' => $result]);
    }

    public function welcome()
    {
        $mains      = Main::active()->where('date', '>', now())->orderBy('row')->get();
        $advantages = Advantage::active()->get();
        $partners   = Partner::active()->orderBy('row')->get();
        $statistics = Statistic::active()->get();
        $blogs      = Blog::active()->withCount('views')->orderBy('views_count', 'desc')->get();
        $about      = About::active()->first();
        $categories = Category::with(['services' => function ($q): void {
            $q->where('is_active', true)->orderBy('row');
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

    public function dynamicPage(Request $request, $slug)
    {
        $types = [
            'news'                             => 'front.news',
            'about'                            => 'front.about',
            'contact'                          => 'front.contact',
            'faq'                              => 'front.faq',
            'sigorta_fealiyeti_haqqinda_qanun' => 'front.sigorta_qanun',
            'dq_nin_is_haqqinda_qanun'         => 'front.dovlet_qulluqculari',
            'icbari_sigortalar_haqqinda_qanun' => 'front.icbari_sigorta_qanun',
            'inzibati_xetalar_mecellesi'       => 'front.inzibati_xetalar_mecellesi',
            'tibbi_sigorta_haqqinda_qanun'     => 'front.tibbi_sigorta_qanun',
            'kasko_sigorta_qaydalar'           => 'front.kasko_qanun',
            'sigorta_beledcisi'                => 'front.sigorta_beledcisi',
            'customs_caclulator'               => 'front.calculator',
            'green_card_calculator'            => 'front.green_card_calculator',
            'casco_calculator'                 => 'front.kasko_kalkulyator',
            'icbari_sigorta_kalkulyatoru'      => 'front.icbari_sigorta_kalkulyatoru',
        ];

        foreach ($types as $type => $view) {
            $page = Single::where('type', $type)->whereHas('translations', function ($query) use ($slug): void {
                $query->where('slug', $slug);
            })->first();

            if ($page) {
                $routes = collect($page->getTranslationsArray())->map(fn ($tr) => $tr['slug'])->toArray();
                $this->createTranslatedLinks($routes, 'dynamic.page');

                $data = [];
                switch ($type) {
                    case 'contact':
                        $data['prefixes'] = Prefix::query()->active()->orderBy('row')->get();
                        $data['map']      = Map::first();
                        break;
                    case 'faq':
                        $data['faqs']        = Faq::active()->orderBy('row')->get();
                        $data['share_icons'] = ShareIcon::query()->where('is_active', true)->get();
                        break;
                    case 'casco_calculator':
                        $data['prefixes'] = Prefix::query()->active()->orderBy('row')->get();
                        break;
                    case 'news':
                        $data['blogs']     = Blog::active()->withCount('views')->orderBy('row')->orderBy('id', 'asc')->get();
                        $data['new_blogs'] = Blog::active()->withCount('views')->orderBy('row')->Where('is_new', true)->orderBy('id', 'asc')->get();
                        break;
                    case 'about':
                        $data['partners']   = Partner::active()->get();
                        $data['advantages'] = Advantage::active()->get();
                        $data['faqs']       = Faq::active()->orderBy('row')->get();
                        $data['about']      = About::active()->first();
                        break;
                }

                return view($view, $data);
            }
        }

        $models = [
            'blog'    => Blog::with('translations')->withCount('views'),
            'link'    => Link::with('translations'),
            'content' => Content::with('translations'),
            'service' => Service::with(['translations', 'form' => function ($q): void {
                $q->where('is_active', true);
            }, 'form.formFields' => function ($q): void {
                $q->where('is_active', true)->orderBy('row');
            }]),
        ];

        foreach ($models as $key => $query) {
            $item = $query->whereHas('translations', function ($query) use ($slug): void {
                $query->where('slug', $slug);
            })->active()->first();

            if ($item) {
                $routes = collect($item->getTranslationsArray())->map(fn ($tr) => $tr['slug'])->toArray();
                $this->createTranslatedLinks($routes, 'dynamic.page');

                $viewData = [$key => $item];
                if ('blog' === $key) {
                    $blog_ip = BlogView::query()
                        ->where('blog_id', $item->id)
                        ->where('ip', $request->ip())
                        ->first();

                    if ( ! $blog_ip) {
                        BlogView::create([
                            'blog_id' => $item->id,
                            'ip'      => $request->ip(),
                        ]);
                    }

                    $viewData['blogs'] = Blog::active()
                        ->where('id', '!=', $item->id)
                        ->withCount('views')
                        ->orderBy('created_at', 'desc')
                        ->get();
                    $viewData['share_icons'] = ShareIcon::query()->where('is_active', true)->get();

                    $viewData['banner'] = Banner::query()->where('is_active', true)->first();

                    return view('front.news_single', $viewData);
                }
                if ('link' === $key) {
                    return view('front.link_single', $viewData);
                }
                if ('service' === $key) {
                    $viewData['prefixes'] = Prefix::query()->active()->orderBy('row')->get();

                    return view('front.service_single', $viewData);
                }
                if ('content' === $key) {
                    $viewData['share_icons'] = ShareIcon::query()->where('is_active', true)->get();

                    return view('front.content_single', $viewData);
                }
            }
        }

        abort(404);
    }

    public function submit(Request $request)
    {

        $recaptchaResponse = $request->input('g-recaptcha-response');
        $secretKey         = env('RECAPTCHA_SECRET_KEY');

        $recaptchaVerifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
        $response           = file_get_contents($recaptchaVerifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
        $responseKeys       = json_decode($response, true);

        if ( ! $responseKeys['success']) {
            return redirect()->back()->withErrors(['captcha' => 'Please complete the reCAPTCHA.']);
        }

        $formData    = $request->except(['_token', 'field_ids', 'g-recaptcha-response']);
        $form_fields = $request->input('field_ids');

        if (isset($form_fields)) {
            $field = FormField::with('form')->findOrFail($request->input('field_ids')[0]);
        } else {
            $field = FormField::with('form')->findOrFail(12);
        }

        $data = FormSubmission::create([
            'data'    => json_encode($formData),
            'title'   => $field->form->title,
            'form_id' => $field->form->id,
        ]);

        Mail::to('sifarish.kasko@gmail.com')->send(new ServiceMail($data));
        //        Mail::to('rashidliseymur@gmail.com')->send(new ServiceMail($data));
        $service_id = $field->form->service->id;
        if($service_id == 9){
//            dd($request->id_series_and_number);
            if($request->emlakin_novu == 'Mənzil'){
                $emlakin_novu = '6';
            }elseif ($request->emlakin_novu == 'Bağ evi'){
                $emlakin_novu = '3';
            }elseif ($request->emlakin_novu == 'Yaşayış binası'){
                $emlakin_novu = '13';
            }

            if($request->firma == 'Paşa sığorta'){
                $firma = '1400837161';
            }elseif ($request->firma == 'Atəşgah sığorta'){
                $firma = '9900004941';
            }elseif ($request->firma == 'Xalq sığorta'){
                $firma = '2000358551';
            }

            $data1 = [
                'voenInsurer'        => $firma,
                'effectiveFromDate'  => Carbon::parse($request->baslama_tarixi)->format('d.m.Y H:i'),
                'registrationNumber' => $request->qeydiyyat_nomresi,
                'registryNumber'     => $request->reyestr_nomresi,
                'propertyUsageType'  => $emlakin_novu,
                'idDocument'         => $request->shexsiyyet_vesiqesi,
                'insuredIdNumber'    => $request->fin_code,
                'insuredPhoneNumber' => $request->prefix . $request->mobile,
                'insuredEmail'       => $request->elektron_poct,
                'juridicalType'      => 0,
                'entityType'         => 'physical',
                'Beneficiary'        => [],
            ];

            $base64Data = base64_encode(json_encode($data1));

            $payload = [
                'compId'        => 'isb',
                'requestNumber' => now()->format('YmdHisv'),
                'base64Data'    => $base64Data,
                'operationType' => 'AppPropertyDEIS',
            ];

            $token    = config('isb.isb_token');
            $api      = config('isb.isb_api');
            $response = Http::withHeaders([
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json',
                'api-token'    => $token,
            ])->post($api . '/getDeisiFrameUrlWithPayload', $payload);

            if ($response->successful()) {
                $url = $response->json()['url'] ?? null;

                if ($url) {
                    return redirect()->away($url);
                }

                return back()->with('error', 'URL tapılmadı.');
            }


        }
        return redirect()->route('success', ['service_id' => $service_id]);
    }

    public function calc_form_submit(Request $request)
    {

        try {
            // Validate reCAPTCHA response
            $recaptchaResponse  = $request->input('g-recaptcha-response');
            $secretKey          = env('RECAPTCHA_SECRET_KEY');
            $recaptchaVerifyUrl = 'https://www.google.com/recaptcha/api/siteverify';

            $response     = file_get_contents($recaptchaVerifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
            $responseKeys = json_decode($response, true);

            if ( ! $responseKeys['success']) {
                return response()->json([
                    'success' => false,
                    'message' => 'Zəhmət olmasa, reCAPTCHA testini tamamlayın.',
                ], 422);
            }

            // Process form data
            $formData    = $request->except(['_token', 'field_ids', 'g-recaptcha-response']);
            $form_fields = $request->input('field_ids');

            if (isset($form_fields)) {
                $field = FormField::with('form')->findOrFail($request->input('field_ids')[0]);
            } else {
                $field = FormField::with('form')->findOrFail(12);
            }

            $data = FormSubmission::create([
                'data'    => json_encode($formData),
                'title'   => $field->form->title,
                'form_id' => $field->form->id,
            ]);

            Mail::to('info@kasko.az')->send(new ServiceMail($data));

            $service_id = $field->form->service->id;

            return response()->json([
                'success'      => true,
                'message'      => 'Form uğurla göndərildi!',
                'redirect_url' => route('success', ['service_id' => $service_id]),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Xəta baş verdi: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function success($service_id = null)
    {
        if ($service_id) {
            $service = Service::findOrFail($service_id);

            $now  = Carbon::now();
            $day  = $now->format('l');
            $time = $now->format('H:i:s');

            $schedule = MessageSchedule::where('day', $day)->first();

            if ($schedule && $time >= $schedule->start_time && $time <= $schedule->end_time) {
                $message      = $service->work_message;
                $message_text = $service->work_text;
            } else {
                $message      = $service->off_message;
                $message_text = $service->off_text;
            }

            return view('front.success', compact('message', 'message_text'));
        }

        return view('front.success');
    }

    public function contact_post(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required|email',
            'message' => 'required',
            'phone'   => 'required',
        ]);

        $contact          = new Contact();
        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->message = $request->message;
        $contact->phone   = $request->prefix . $request->phone;
        $contact->save();

        return redirect()->route('success');
    }

    public function email()
    {
        return view('front.email_template');
    }

    public function successDeis(Request $request)
    {
        $insurance = Insurance::query()->where('contractNumber',$request->policyNumber)->first();
        $payment_code = $insurance->paymentCode;
        return view('front.success_deis', compact('payment_code'));
    }
    public function failDeis()
    {
        return view('front.fail-deis');
    }


}
