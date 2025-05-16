<tbody wire:sortable="updateFaqOrder">

@foreach($faqs as $faq)

    <tr  wire:sortable.item="{{ $faq->id }}" wire:key="faq-{{ $faq->id }}">
        <td>{{$faq->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$faq->title}}</td>
        <td>{{$faq->is_active ? 'active' : 'deactive'}}</td>
        <td>
            <a href="{{route('faqs.edit',$faq->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('faqs.destroy', $faq->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
