<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Form;
use App\Models\Service;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-services|create-services|edit-services|delete-services', ['only' => ['index','show']]);
        $this->middleware('permission:create-services', ['only' => ['create','store']]);
        $this->middleware('permission:edit-services', ['only' => ['edit']]);
        $this->middleware('permission:delete-services', ['only' => ['destroy']]);
    }

    function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
//        $count = Service::whereTranslation('title', $title)->count();
//
//        if ($count > 0) {
//            $slug .= '-' . $count;
//        }

        return $slug;
    }

    public function index()
    {

        $services = Service::all();
        return view('admin.services.index', compact('services'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $categories = Category::all();
        $forms = Form::all();
        return view('admin.services.create', compact('categories','forms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'az_title'=>'required',
            'en_title'=>'required',
            'ru_title'=>'required',
            'az_img_alt'=>'nullable',
            'en_img_alt'=>'nullable',
            'ru_img_alt'=>'nullable',
            'az_img_title'=>'nullable',
            'en_img_title'=>'nullable',
            'ru_img_title'=>'nullable',
            'az_description'=>'required',
            'en_description'=>'required',
            'ru_description'=>'required',
            'image'=>'nullable',
        ]);

        if($request->hasFile('image')){
            $filename = $this->imageUploadService->upload($request->file('image'));
        }
        if($request->hasFile('icon')){
            $filename_icon = $this->imageUploadService->upload($request->file('icon'));
        }

        Service::create([
            'image'=>  $filename ?? null,
            'icon'=>  $filename_icon ?? null,
            'category_id' =>$request->category_id,
            'form_id' =>$request->form_id,
            'az'=>[
                'title'=>$request->az_title,
                'description'=>$request->az_description,
                'short_description'=>$request->az_short_description,
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
                'slug'=>$this->generateUniqueSlug($request->az_title),
                'meta_title'=>$request->az_meta_title,
                'meta_description'=>$request->az_meta_description,
                'meta_keywords'=>$request->az_meta_keywords,
                'work_message' => $request->az_work_message,
                'off_message' => $request->az_off_message,
                'work_text' => $request->az_work_text,
                'off_text' => $request->az_off_text,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'description'=>$request->en_description,
                'short_description'=>$request->en_short_description,
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
                'slug'=>$this->generateUniqueSlug($request->en_title),
                'meta_title'=>$request->en_meta_title,
                'meta_description'=>$request->en_meta_description,
                'meta_keywords'=>$request->en_meta_keywords,
                'work_message' => $request->en_work_message,
                'off_message' => $request->en_off_message,
                'work_text' => $request->en_work_text,
                'off_text' => $request->en_off_text,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'description'=>$request->ru_description,
                'short_description'=>$request->ru_short_description,
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
                'slug'=>$this->generateUniqueSlug($request->ru_title),
                'meta_title'=>$request->ru_meta_title,
                'meta_description'=>$request->ru_meta_description,
                'meta_keywords'=>$request->ru_meta_keywords,
                'work_message' => $request->ru_work_message,
                'off_message' => $request->ru_off_message,
                'work_text' => $request->ru_work_text,
                'off_text' => $request->ru_off_text,
            ]
        ]);

        return redirect()->route('services.index')->with('message','Service added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        $forms = Form::all();
        return view('admin.services.edit', compact('service','categories','forms'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'az_title'=>'required',
            'en_title'=>'required',
            'ru_title'=>'required',
            'az_img_alt'=>'nullable',
            'en_img_alt'=>'nullable',
            'ru_img_alt'=>'nullable',
            'az_img_title'=>'nullable',
            'en_img_title'=>'nullable',
            'ru_img_title'=>'nullable',
            'az_description'=>'required',
            'en_description'=>'required',
            'ru_description'=>'required',
        ]);

        if($request->hasFile('image')){
            $service->image = $this->imageUploadService->upload($request->file('image'));
        }
        if($request->hasFile('icon')){
            $service->icon = $this->imageUploadService->upload($request->file('icon'));
        }

        $service->update( [
            'category_id' =>$request->category_id,
            'form_id' =>$request->form_id,
            'is_active'=> $request->is_active,
            'az'=>[
                'title'=>$request->az_title,
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
                'description'=>$request->az_description,
                'short_description'=>$request->az_short_description,
                'meta_title'=>$request->az_meta_title,
                'meta_description'=>$request->az_meta_description,
                'meta_keywords'=>$request->az_meta_keywords,
                'work_message' => $request->az_work_message,
                'off_message' => $request->az_off_message,
                'work_text' => $request->az_work_text,
                'off_text' => $request->az_off_text,
                'slug'=>$this->generateUniqueSlug($request->az_title),
            ],
            'en'=>[
                'title'=>$request->en_title,
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
                'description'=>$request->en_description,
                'short_description'=>$request->en_short_description,
                'meta_title'=>$request->en_meta_title,
                'meta_description'=>$request->en_meta_description,
                'meta_keywords'=>$request->en_meta_keywords,
                'work_message' => $request->en_work_message,
                'off_message' => $request->en_off_message,
                'work_text' => $request->en_work_text,
                'off_text' => $request->en_off_text,
                'slug'=>$this->generateUniqueSlug($request->en_title),
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
                'description'=>$request->ru_description,
                'short_description'=>$request->ru_short_description,
                'meta_title'=>$request->ru_meta_title,
                'meta_description'=>$request->ru_meta_description,
                'meta_keywords'=>$request->ru_meta_keywords,
                'work_message' => $request->ru_work_message,
                'off_message' => $request->ru_off_message,
                'work_text' => $request->ru_work_text,
                'off_text' => $request->ru_off_text,
                'slug'=>$this->generateUniqueSlug($request->ru_title),
            ]

        ]);

        return redirect()->back()->with('message','Service updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {

        $service->delete();
        return redirect()->route('services.index')->with('message', 'Service deleted successfully');

    }

}
