<tbody wire:sortable="updatePartnerOrder">

@foreach($partners as $partner)

    <tr  wire:sortable.item="{{ $partner->id }}" wire:key="partner-{{ $partner->id }}">
        <td>{{$partner->row}}</td>
        <td wire:sortable.handle style="cursor: pointer">
            <img src="{{asset('storage/' . $partner->image)}}" width="100px" height="100px" alt="">
        </td>
        <td>{{$partner->is_active == true ? 'Active' : 'Deactive'}}</td>
        <td>
            <a href="{{route('partners.edit',$partner->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            <form action="{{route('partners.destroy', $partner->id)}}" method="post" style="display: inline-block">
                {{ method_field('DELETE') }}
                @csrf
                <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

@endforeach
