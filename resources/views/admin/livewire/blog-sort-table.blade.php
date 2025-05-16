<tbody wire:sortable="updateBlogOrder">

@foreach($blogs as $blog)

    <tr  wire:sortable.item="{{ $blog->id }}" wire:key="blog-{{ $blog->id }}">
        <td>{{$blog->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">
            {{$blog->title}}
        </td>
        <td>{{$blog->is_active ? 'Active' : 'Deactive'}}</td>
        <td>
            <a href="{{route('blogs.edit',$blog->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('blogs.destroy', $blog->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

@endforeach
