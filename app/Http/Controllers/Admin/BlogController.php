<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BlogController extends Controller
{
    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-blogs|create-blogs|edit-blogs|delete-blogs', ['only' => ['index','show']]);
        $this->middleware('permission:create-blogs', ['only' => ['create','store']]);
        $this->middleware('permission:edit-blogs', ['only' => ['edit']]);
        $this->middleware('permission:delete-blogs', ['only' => ['destroy']]);
    }

    function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
//        $count = Blog::whereTranslation('title', $title)->count();
//
//        if ($count > 0) {
//            $slug .= '-' . $count;
//        }

        return $slug;
    }

    public function index()
    {

        $blogs = Blog::query()->withCount('views')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $services = Service::active()->get();
        return view('admin.blogs.create', compact('services'));
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
            'az_description'=>'nullable',
            'en_description'=>'nullable',
            'ru_description'=>'nullable',
            'image'=>'required',
        ]);
        DB::beginTransaction();
        try {
            if($request->hasFile('image')){
                $filename = $this->imageUploadService->upload($request->file('image'));
            }
            if($request->hasFile('banner_desktop')){
                $filename_banner_desktop = $this->imageUploadService->upload($request->file('banner_desktop'));
            }

            $blog = Blog::create([
                'image'=>  $filename,
                'banner_desktop'=>  $filename_banner_desktop ?? null,
                'is_new'=> isset($request->is_new),
                'az'=>[
                    'title'=>$request->az_title,
                    'description'=>$request->az_description,
                    'img_alt'=>$request->az_img_alt,
                    'img_title'=>$request->az_img_title,
                    'slug'=>$this->generateUniqueSlug($request->az_title),
                    'meta_title'=>$request->az_meta_title,
                    'meta_description'=>$request->az_meta_description,
                    'meta_keywords'=>$request->az_meta_keywords,
                    'short_text'=>$request->az_short_text,
                    'short_description'=>$request->az_short_description,
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
                    'short_text'=>$request->en_short_text,
                    'short_description'=>$request->en_short_description,
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
                    'short_text'=>$request->ru_short_text,
                    'short_description'=>$request->ru_short_description,
                ]
            ]);

            if ($request->hasFile('slider_images')) {
                foreach ($request->file('slider_images') as $file) {
                    $filename = $this->imageUploadService->upload($file);
                    $blog->sliders()->create([
                        'image' => $filename,
                    ]);
                }
            }

            if ($request->services) {
                $blog->services()->attach($request->services);
            }

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }

        return redirect()->route('blogs.index')->with('message','Blog added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $services = Service::active()->get();
        return view('admin.blogs.edit', compact('blog','services'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Blog $blog)
    {
//        dd($request->az_description);
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
            'az_description'=>'nullable',
            'en_description'=>'nullable',
            'ru_description'=>'nullable',
        ]);
        DB::beginTransaction();
        try {
            if($request->hasFile('image')){
                $blog->image = $this->imageUploadService->upload($request->file('image'));
            }
            if($request->hasFile('banner_desktop')){
                $blog->banner_desktop = $this->imageUploadService->upload($request->file('banner_desktop'));
            }

            $blog->update( [

                'is_active'=> $request->is_active,
                'is_new'=> isset($request->is_new),
                'az'=>[
                    'title'=>$request->az_title,
                    'img_alt'=>$request->az_img_alt,
                    'img_title'=>$request->az_img_title,
                    'description'=>$request->az_description,
                    'meta_title'=>$request->az_meta_title,
                    'meta_description'=>$request->az_meta_description,
                    'meta_keywords'=>$request->az_meta_keywords,
                    'short_text'=>$request->az_short_text,
                    'short_description'=>$request->az_short_description,
                    'slug'=>$this->generateUniqueSlug($request->az_title),
                ],
                'en'=>[
                    'title'=>$request->en_title,
                    'img_alt'=>$request->en_img_alt,
                    'img_title'=>$request->en_img_title,
                    'description'=>$request->en_description,
                    'meta_title'=>$request->en_meta_title,
                    'meta_description'=>$request->en_meta_description,
                    'meta_keywords'=>$request->en_meta_keywords,
                    'short_text'=>$request->en_short_text,
                    'short_description'=>$request->en_short_description,
                    'slug'=>$this->generateUniqueSlug($request->en_title),
                ],
                'ru'=>[
                    'title'=>$request->ru_title,
                    'img_alt'=>$request->ru_img_alt,
                    'img_title'=>$request->ru_img_title,
                    'description'=>$request->ru_description,
                    'meta_title'=>$request->ru_meta_title,
                    'meta_description'=>$request->ru_meta_description,
                    'meta_keywords'=>$request->ru_meta_keywords,
                    'short_text'=>$request->ru_short_text,
                    'short_description'=>$request->ru_short_description,
                    'slug'=>$this->generateUniqueSlug($request->ru_title),
                ]

            ]);

            if ($request->hasFile('slider_images')) {

                foreach ($request->file('slider_images') as $file) {
                    $filename = $this->imageUploadService->upload($file);
                    $blog->sliders()->create([
                        'image' => $filename,
                    ]);
                }

            }

            if ($request->services) {
                $blog->services()->sync($request->services);
            } else {
                $blog->services()->detach();
            }

            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->back()->with('message','Blog updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

        $blog->delete();
        return redirect()->route('blogs.index')->with('message', 'Blog deleted successfully');

    }

    public function deleteImage($id)
    {

        DB::table('sliders')->where('id', '=', $id)->delete();
        return redirect()->back();

    }
}
