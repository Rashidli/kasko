<tbody wire:sortable="updateContactItemOrder">

@foreach($contact_items as $contact_item)

    <tr  wire:sortable.item="{{ $contact_item->id }}" wire:key="contact_item-{{ $contact_item->id }}">
        <td>{{$contact_item->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$contact_item->title}}</td>
        <td>{{$contact_item->is_active ? 'active' : 'deactive'}}</td>
        <td>
            <a href="{{route('contact_items.edit',$contact_item->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('contact_items.destroy', $contact_item->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
