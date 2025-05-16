<tbody wire:sortable="updateMainOrder">

@foreach($mains as $main)

    <tr  wire:sortable.item="{{ $main->id }}" wire:key="main-{{ $main->id }}">
        <td>{{$main->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$main->title}}</td>
        <td>{{$main->type}}</td>
        <td>{{$main->is_active ? 'active' : 'deactive'}}</td>
        <td>
            <a href="{{route('mains.edit',$main->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('mains.destroy', $main->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
