<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvantageController extends Controller
{
    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-advantages|create-advantages|edit-advantages|delete-advantages', ['only' => ['index','show']]);
        $this->middleware('permission:create-advantages', ['only' => ['create','store']]);
        $this->middleware('permission:edit-advantages', ['only' => ['edit']]);
        $this->middleware('permission:delete-advantages', ['only' => ['destroy']]);
    }

    public function index()
    {

        $advantages = Advantage::paginate(10);
        return view('admin.advantages.index', compact('advantages'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.advantages.create');
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
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
        }

        Advantage::create([
            'image'=>  $filename,
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

        return redirect()->route('advantages.index')->with('message','Advantage added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advantage $advantage)
    {

        return view('admin.advantages.edit', compact('advantage'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Advantage $advantage)
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

            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $advantage->image = $filename;
        }

        $advantage->update( [

            'is_active'=> $request->is_active,
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

        return redirect()->back()->with('message','Advantage updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advantage $advantage)
    {

        $advantage->delete();
        return redirect()->route('advantages.index')->with('message', 'Advantage deleted successfully');

    }
}
