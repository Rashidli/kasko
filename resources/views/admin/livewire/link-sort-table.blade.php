<tbody wire:sortable="updateLinkOrder">

@foreach($links as $link)

    <tr  wire:sortable.item="{{ $link->id }}" wire:key="link-{{ $link->id }}">
        <td>{{$link->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$link->title}}</td>
        <td>{{$link->is_active ? 'active' : 'deactive'}}</td>
        <td>
            <a href="{{route('links.edit',$link->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('links.destroy', $link->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
