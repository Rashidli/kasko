<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function __construct(protected ImageUploadService $imageUploadService)
    {
        $this->middleware('permission:list-partners|create-partners|edit-partners|delete-partners', ['only' => ['index','show']]);
        $this->middleware('permission:create-partners', ['only' => ['create','store']]);
        $this->middleware('permission:edit-partners', ['only' => ['edit']]);
        $this->middleware('permission:delete-partners', ['only' => ['destroy']]);
    }

    public function index()
    {

        $partners = Partner::paginate(10);
        return view('admin.partners.index', compact('partners'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'az_img_alt'=>'nullable',
            'en_img_alt'=>'nullable',
            'ru_img_alt'=>'nullable',
            'az_img_title'=>'nullable',
            'en_img_title'=>'nullable',
            'ru_img_title'=>'nullable',
            'image'=>'required',
        ]);

        if($request->hasFile('image')){
            $filename = $this->imageUploadService->upload($request->file('image'));
        }

        Partner::create([
            'image'=>  $filename,
            'az'=>[
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
            ],
            'en'=>[
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
            ],
            'ru'=>[
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
            ]
        ]);

        return redirect()->route('partners.index')->with('message','Partner added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {

        return view('admin.partners.edit', compact('partner'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Partner $partner)
    {

        $request->validate([
            'az_img_alt'=>'nullable',
            'en_img_alt'=>'nullable',
            'ru_img_alt'=>'nullable',
            'az_img_title'=>'nullable',
            'en_img_title'=>'nullable',
            'ru_img_title'=>'nullable',
        ]);

        if($request->hasFile('image')){
            $partner->image = $this->imageUploadService->upload($request->file('image'));
        }

        $partner->update( [

            'is_active'=> $request->is_active,
            'az'=>[
                'img_alt'=>$request->az_img_alt,
                'img_title'=>$request->az_img_title,
            ],
            'en'=>[
                'img_alt'=>$request->en_img_alt,
                'img_title'=>$request->en_img_title,
            ],
            'ru'=>[
                'img_alt'=>$request->ru_img_alt,
                'img_title'=>$request->ru_img_title,
            ]

        ]);

        return redirect()->back()->with('message','Partner updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $partner)
    {

        $partner->delete();
        return redirect()->route('partners.index')->with('message', 'Partner deleted successfully');

    }
}
