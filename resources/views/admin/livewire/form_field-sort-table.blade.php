<tbody wire:sortable="updateFormFieldOrder">

@foreach($form_fields as $form_field)

    <tr  wire:sortable.item="{{ $form_field->id }}" wire:key="form_field-{{ $form_field->id }}">
        <td>{{$form_field->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">
            {{$form_field->name}}
        </td>
        <td>{{$form_field->type}}</td>
        <td>{{$form_field->translate('az')->label}}</td>
        <td>{{$form_field->is_active ? 'Active' : 'Inactive'}}</td>
        <td>
            <a href="{{route('forms.form_fields.edit', [$form->id, $form_field->id])}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('forms.form_fields.destroy', [$form->id, $form_field->id])}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

@endforeach
