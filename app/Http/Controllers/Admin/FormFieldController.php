<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormField;
use Illuminate\Http\Request;

class FormFieldController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:list-form_fields|create-form_fields|edit-form_fields|delete-form_fields', ['only' => ['index','show']]);
        $this->middleware('permission:create-form_fields', ['only' => ['create','store']]);
        $this->middleware('permission:edit-form_fields', ['only' => ['edit']]);
        $this->middleware('permission:delete-form_fields', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Form $form)
    {
        $form_fields = $form->formFields()->paginate(10);
        return view('admin.form_fields.index', compact('form', 'form_fields'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Form $form)
    {
        return view('admin.form_fields.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Form $form)
    {

        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'is_required' => 'required|boolean',
            'az_label' => 'required|string',
            'en_label' => 'required|string',
            'ru_label' => 'required|string',
            'az_placeholder' => 'required|string',
            'en_placeholder' => 'required|string',
            'ru_placeholder' => 'required|string',
            'az_options' => 'nullable',
            'en_options' => 'nullable',
            'ru_options' => 'nullable',
            'is_active' => 'required|boolean',
        ]);

        $form->formFields()->create([
            'name' => $request->name,
            'type' => $request->type,
            'is_required' => $request->is_required,
            'is_active' => $request->is_active,
            'az' => [
                'label' => $request->az_label,
                'placeholder' => $request->az_placeholder,
                'options' => $request->az_options,
            ],
            'en' => [
                'label' => $request->en_label,
                'placeholder' => $request->en_placeholder,
                'options' => $request->en_options,
            ],
            'ru' => [
                'label' => $request->ru_label,
                'placeholder' => $request->ru_placeholder,
                'options' => $request->ru_options,
            ],
        ]);

        return redirect()->route('forms.form_fields.index', $form->id)->with('message', 'Form Field added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Form $form, FormField $form_field)
    {
        return view('admin.form_fields.edit', compact('form', 'form_field'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Form $form, FormField $form_field)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'is_required' => 'required|boolean',
            'az_label' => 'required|string',
            'en_label' => 'required|string',
            'ru_label' => 'required|string',
            'az_options' => 'nullable|string',
            'en_options' => 'nullable|string',
            'ru_options' => 'nullable|string',
            'is_active' => 'required|boolean',
            'az_placeholder' => 'required|string',
            'en_placeholder' => 'required|string',
            'ru_placeholder' => 'required|string',
        ]);

        $form_field->update([
            'name' => $request->name,
            'type' => $request->type,
            'is_required' => $request->is_required,
            'is_active' => $request->is_active,
            'az' => [
                'label' => $request->az_label,
                'placeholder' => $request->az_placeholder,
                'options' => $request->az_options,
            ],
            'en' => [
                'label' => $request->en_label,
                'placeholder' => $request->en_placeholder,
                'options' => $request->en_options,
            ],
            'ru' => [
                'label' => $request->ru_label,
                'placeholder' => $request->ru_placeholder,
                'options' => $request->ru_options,
            ],
        ]);

        return redirect()->route('forms.form_fields.index', $form->id)->with('message', 'Form Field updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Form $form, FormField $form_field)
    {
        $form_field->delete();
        return redirect()->route('forms.form_fields.index', $form->id)->with('message', 'Form Field deleted successfully');
    }
}
