<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list-forms|create-forms|edit-forms|delete-forms', ['only' => ['index','show']]);
        $this->middleware('permission:create-forms', ['only' => ['create','store']]);
        $this->middleware('permission:edit-forms', ['only' => ['edit']]);
        $this->middleware('permission:delete-forms', ['only' => ['destroy']]);
    }
    public function index()
    {

        $forms = Form::query()->paginate(20);
        return view('admin.forms.index', compact('forms'));

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
        ]);

        Form::create([
            'title' => $request->title
        ]);

        return redirect()->route('forms.index')->with('message','Form added successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form)
    {

        return view('admin.forms.edit', compact('form'));

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Form $form)
    {

        $request->validate([
            'title'=>'required',
        ]);

        $form->update( [

            'is_active'=> $request->is_active,
            'title' => $request->title

        ]);

        return redirect()->back()->with('message','Form updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form)
    {

        $form->delete();
        return redirect()->route('forms.index')->with('message', 'Form deleted successfully');

    }
}
