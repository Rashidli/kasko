<tbody wire:sortable="updateContentOrder">

@foreach($contents as $content)

    <tr  wire:sortable.item="{{ $content->id }}" wire:key="content-{{ $content->id }}">
        <td>{{$content->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">
            {{$content->title}}
        </td>
        <td>{{$content->is_active == true ? 'Active' : 'Deactive'}}</td>
        <td>
            <a href="{{route('contents.edit',$content->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('contents.destroy', $content->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

@endforeach
