<tbody wire:sortable="updateContactSocialOrder">

@foreach($contact_socials as $contact_social)
    <tr  wire:sortable.item="{{ $contact_social->id }}" wire:key="contact_social-{{ $contact_social->id }}">
        <td>{{$contact_social->row}}</td>
        <td>{{$contact_social->title}}</td>
        <td wire:sortable.handle style="cursor: pointer">
            <img src="{{asset('storage/' . $contact_social->image)}}" width="100px" height="100px" alt="">
        </td>
        <td>{{$contact_social->is_active == true ? 'Active' : 'Deactive'}}</td>
        <td>
            <a href="{{route('contact_socials.edit',$contact_social->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
            @if($contact_social->id != 5)
                <form action="{{route('contact_socials.destroy', $contact_social->id)}}" method="post" style="display: inline-block">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button onclick="return confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        </td>
    </tr>
@endforeach


