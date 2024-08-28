<tbody wire:sortable="updateServiceOrder">

@foreach($services as $service)

    <tr  wire:sortable.item="{{ $service->id }}" wire:key="service-{{ $service->id }}">
        <td>{{$service->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">{{$service->title}}</td>
        <td>{{$service->category?->title}}</td>
        <td>{{$service->is_active ? 'active' : 'deactive'}}</td>
        <td>
            <a href="{{route('services.edit',$service->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('services.destroy', $service->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@endforeach

</tbody>
