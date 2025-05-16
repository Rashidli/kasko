<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Main;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-sliders|create-sliders|edit-sliders|delete-sliders', ['only' => ['index','show']]);
        $this->middleware('permission:create-sliders', ['only' => ['create','store']]);
        $this->middleware('permission:edit-sliders', ['only' => ['edit']]);
        $this->middleware('permission:delete-sliders', ['only' => ['destroy']]);
    }
    public function index()
    {

        $mains = Main::paginate(10);
        return view('admin.mains.index', compact('mains'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.mains.create');
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
        ]);

        if($request->hasFile('image')){
            $filename = $this->imageUploadService->upload($request->file('image'));
        }

        if($request->hasFile('mobile_image')){
            $filenameMobile = $this->imageUploadService->upload($request->file('mobile_image'));
        }

        Main::create([
            'image'=>  $filename ?? null,
            'mobile_image'=>  $filenameMobile ?? null,
            'date' => $request->date,
            'link' => $request->link,
            'type' => $request->type,
            'az'=>[
                'title'=>$request->az_title,
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
                'description'=>$request->az_description,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
                'description'=>$request->en_description,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
                'description'=>$request->ru_description,
            ]
        ]);

        return redirect()->route('mains.index')->with('message','Main added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Main $main)
    {

        return view('admin.mains.edit', compact('main'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Main $main)
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
            $main->image = $this->imageUploadService->upload($request->file('image'));
        }

        if($request->hasFile('mobile_image')){
            $main->mobile_image = $this->imageUploadService->upload($request->file('mobile_image'));
        }

        $main->update( [
            'date' => $request->date,
            'is_active'=> $request->is_active,
            'link' => $request->link,
            'type' => $request->type,
            'az'=>[
                'title'=>$request->az_title,
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
                'description'=>$request->az_description,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
                'description'=>$request->en_description,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
                'description'=>$request->ru_description,
            ]

        ]);

        return redirect()->back()->with('message','Main updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Main $main)
    {

        $main->delete();
        return redirect()->route('mains.index')->with('message', 'Main deleted successfully');

    }
}
