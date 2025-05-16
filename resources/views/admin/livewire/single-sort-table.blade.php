<tbody wire:sortable="updateSingleOrder">

@foreach($singles as $single)

    <tr  wire:sortable.item="{{ $single->id }}" wire:key="single-{{ $single->id }}">
        <td>{{$single->row}}</td>
        <td wire:sortable.handle style="cursor: pointer" title="{{$single->type}}">
            {{$single->title}}
        </td>
{{--        <td>{{$single->is_active == true ? 'Active' : 'Deactive'}}</td>--}}
        <td>
            <a href="{{route('singles.edit',$single->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
{{--            <form action="{{route('singles.destroy', $single->id)}}" method="post" style="display: inline-block">--}}
{{--                {{ method_field('DELETE') }}--}}
{{--                @csrf--}}
{{--                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>--}}
{{--            </form>--}}
        </td>
    </tr>

@endforeach
