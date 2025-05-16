@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <h4 class="card-title">Paylaşma iconları</h4>
                            <a href="{{route('share_icons.create')}}" class="btn btn-primary">+</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">

                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Başlıq</th>
                                        <th>Status</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tbody>

                                    @foreach($share_icons as $share_icon)

                                        <tr>
                                            <td>{{$share_icon->id}}</td>
                                            <td>{{$share_icon->title}}</td>
                                            <td>{{$share_icon->is_active ? 'active' : 'deactive'}}</td>
                                            <td>
                                                <a href="{{route('share_icons.edit',$share_icon->id)}}"
                                                   class="btn btn-primary" style="margin-right: 15px">Edit</a>
                                                <form action="{{route('share_icons.destroy', $share_icon->id)}}"
                                                      method="post" style="display: inline-block">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')"
                                                            type="submit" class="btn btn-danger">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <br>
                                {{ $share_icons->links('admin.vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('admin.includes.footer')
