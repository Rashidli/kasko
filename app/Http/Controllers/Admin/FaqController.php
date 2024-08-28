<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-faqs|create-faqs|edit-faqs|delete-faqs', ['only' => ['index','show']]);
        $this->middleware('permission:create-faqs', ['only' => ['create','store']]);
        $this->middleware('permission:edit-faqs', ['only' => ['edit']]);
        $this->middleware('permission:delete-faqs', ['only' => ['destroy']]);
    }

    public function index()
    {

        $faqs = Faq::paginate(10);
        return view('admin.faqs.index', compact('faqs'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.faqs.create');
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
            'az_description'=>'required',
            'en_description'=>'required',
            'ru_description'=>'required',
        ]);

        Faq::create([
            'az'=>[
                'title'=>$request->az_title,
                'description'=>$request->az_description,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'description'=>$request->en_description,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'description'=>$request->ru_description,
            ]
        ]);

        return redirect()->route('faqs.index')->with('message','Faq added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {

        return view('admin.faqs.edit', compact('faq'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Faq $faq)
    {

        $request->validate([
            'az_title'=>'required',
            'en_title'=>'required',
            'ru_title'=>'required',
            'az_description'=>'required',
            'en_description'=>'required',
            'ru_description'=>'required',
        ]);

        $faq->update( [

            'is_active'=> $request->is_active,
            'az'=>[
                'title'=>$request->az_title,
                'description'=>$request->az_description,
            ],
            'en'=>[
                'title'=>$request->en_title,
                'description'=>$request->en_description,
            ],
            'ru'=>[
                'title'=>$request->ru_title,
                'description'=>$request->ru_description,
            ]

        ]);

        return redirect()->back()->with('message','Faq updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {

        $faq->delete();
        return redirect()->route('faqs.index')->with('message', 'Faq deleted successfully');

    }
}
