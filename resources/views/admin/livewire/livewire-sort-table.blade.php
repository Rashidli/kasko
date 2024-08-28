<tbody wire:sortable="updateCategoryOrder">

@foreach($categories as $category)

    <tr  wire:sortable.item="{{ $category->id }}" wire:key="category-{{ $category->id }}">
        <td>{{$category->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$category->title}}</td>
        <td>
            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('categories.destroy', $category->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
