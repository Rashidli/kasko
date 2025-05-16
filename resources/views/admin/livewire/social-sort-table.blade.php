<tbody wire:sortable="updateSocialOrder">

@foreach($socials as $social)

    <tr  wire:sortable.item="{{ $social->id }}" wire:key="social-{{ $social->id }}">
        <td>{{$social->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$social->title}}</td>
        <td>{{$social->is_active ? 'active' : 'deactive'}}</td>
        <td>
            <a href="{{route('socials.edit',$social->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('socials.destroy', $social->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
