<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactSocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-contact_socials|create-contact_socials|edit-contact_socials|delete-contact_socials', ['only' => ['index','show']]);
        $this->middleware('permission:create-contact_socials', ['only' => ['create','store']]);
        $this->middleware('permission:edit-contact_socials', ['only' => ['edit']]);
        $this->middleware('permission:delete-contact_socials', ['only' => ['destroy']]);
    }

    public function index()
    {

        $contact_socials = ContactSocial::paginate(10);
        return view('admin.contact_socials.index', compact('contact_socials'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.contact_socials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            $request->validate([
                'image'=>'nullable',
                'link'=>'nullable',
            ]);

            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = Str::uuid() . "." . $file->extension();
                $file->storeAs('public/',$filename);
            }

            ContactSocial::create([
                'image'=>  $filename ?? null,
                'link'=>$request->link,
                'az'=>[
                    'title'=>$request->az_title,
                ],
                'en'=>[
                    'title'=>$request->en_title,
                ],
                'ru'=>[
                    'title'=>$request->ru_title,
                ]
            ]);

        }catch (\Exception$exception){
            return $exception->getMessage();
        }

        return redirect()->route('contact_socials.index')->with('message','ContactSocial added successfully');

    }

    /**
     * Display the specified resource.
     */

    public function show(ContactSocial $contact_socials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactSocial $contact_social)
    {

        return view('admin.contact_socials.edit', compact('contact_social'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, ContactSocial $contact_social)
    {

        $request->validate([
            'link'=>'nullable',
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = Str::uuid() . "." . $file->extension();
            $file->storeAs('public/',$filename);
            $contact_social->image = $filename;
        }

        $contact_social->update( [
            'is_active'=> $request->is_active,
            'link'=>$request->link,
            'az'=>[
                'title'=>$request->az_title,
            ],
            'en'=>[
                'title'=>$request->en_title,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
            ]
        ]);

        return redirect()->back()->with('message','ContactSocial updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactSocial $contact_social)
    {

        $contact_social->delete();
        return redirect()->route('contact_socials.index')->with('message', 'ContactSocial deleted successfully');

    }
}
