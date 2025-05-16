<tbody wire:sortable="updatePrefixOrder">

@foreach($prefixes as $prefix)

    <tr  wire:sortable.item="{{ $prefix->id }}" wire:key="prefix-{{ $prefix->id }}">
        <td>{{$prefix->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">
            {{$prefix->prefix}}
        </td>
        <td>{{$prefix->is_active  ? 'Active' : 'Deactive'}}</td>
        <td>
            <a href="{{route('prefixes.edit',$prefix->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('prefixes.destroy', $prefix->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

@endforeach
