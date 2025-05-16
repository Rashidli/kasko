<?php

namespace App\Livewire;

use App\Models\FormField;
use Livewire\Component;

class FormFieldSortTable extends Component
{
    public $form;

    public function mount($form)
    {
        $this->form = $form;
    }

    public function updateFormFieldOrder($form_fields)
    {
        foreach ($form_fields as $field) {
            FormField::whereId($field['value'])->update(['row' => $field['order']]);
        }
    }

    public function render()
    {
        $form_fields = $this->form->formFields()->orderBy('row')->get();

        return view('admin.livewire.form_field-sort-table', compact('form_fields'));
    }
}

