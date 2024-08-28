<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-contents|create-contents|edit-contents|delete-contents', ['only' => ['index','show']]);
        $this->middleware('permission:create-contents', ['only' => ['create','store']]);
        $this->middleware('permission:edit-contents', ['only' => ['edit']]);
        $this->middleware('permission:delete-contents', ['only' => ['destroy']]);
    }

    function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = Content::whereTranslation('title', $title)->count();

        if ($count > 0) {
            $slug .= '-' . $count;
        }

        return $slug;
    }

    public function index()
    {

        $contents = Content::paginate(10);
        return view('admin.contents.index', compact('contents'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.contents.create');
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
            'image'=>'required',
        ]);

        if($request->hasFile('image')){
            $filename = $this->imageUploadService->upload($request->file('image'));
        }

        Content::create([
            'image'=>  $filename,
            'az'=>[
                'title'=>$request->az_title,
                'description'=>$request->az_description,
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
                'slug'=>$this->generateUniqueSlug($request->az_title),
                'meta_title'=>$request->az_meta_title,
                'meta_description'=>$request->az_meta_description,
                'meta_keywords'=>$request->az_meta_keywords,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'description'=>$request->en_description,
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
                'slug'=>$this->generateUniqueSlug($request->en_title),
                'meta_title'=>$request->en_meta_title,
                'meta_description'=>$request->en_meta_description,
                'meta_keywords'=>$request->en_meta_keywords,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'description'=>$request->ru_description,
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
                'slug'=>$this->generateUniqueSlug($request->ru_title),
                'meta_title'=>$request->ru_meta_title,
                'meta_description'=>$request->ru_meta_description,
                'meta_keywords'=>$request->ru_meta_keywords,
            ]
        ]);

        return redirect()->route('contents.index')->with('message','Content added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {

        return view('admin.contents.edit', compact('content'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Content $content)
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
            $content->image = $this->imageUploadService->upload($request->file('image'));
        }

        $content->update( [

            'is_active'=> $request->is_active,
            'az'=>[
                'title'=>$request->az_title,
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
                'description'=>$request->az_description,
                'meta_title'=>$request->az_meta_title,
                'meta_description'=>$request->az_meta_description,
                'meta_keywords'=>$request->az_meta_keywords,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
                'description'=>$request->en_description,
                'meta_title'=>$request->en_meta_title,
                'meta_description'=>$request->en_meta_description,
                'meta_keywords'=>$request->en_meta_keywords,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
                'description'=>$request->ru_description,
                'meta_title'=>$request->ru_meta_title,
                'meta_description'=>$request->ru_meta_description,
                'meta_keywords'=>$request->ru_meta_keywords,
            ]

        ]);

        return redirect()->back()->with('message','Content updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {

        $content->delete();
        return redirect()->route('contents.index')->with('message', 'Content deleted successfully');

    }

}
