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
                                <h4 class="card-title">Banner</h4>
{{--                                    <a href="{{route('banners.create')}}" class="btn btn-primary">+</a>--}}
                                <br>
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-centered mb-0 align-middle table-hover table-nowrap">

                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Banner</th>
                                                <th>Status</th>
                                                <th>Əməliyyat</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($banners as $key => $banner)

                                            <tr>
                                                <td>{{$banner->id}}</td>
                                                <td><img style="width: 100px; height: 100px" src="{{asset('storage/' . $banner->banner)}}" alt=""></td>
                                                <td>{{$banner->is_active ? 'Active' : 'Deactive'}}</td>
                                                <td>
                                                    <a href="{{route('banners.edit',$banner->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
{{--                                                    <form action="{{route('banners.destroy', $banner->id)}}" method="post" style="display: inline-block">--}}
{{--                                                        {{ method_field('DELETE') }}--}}
{{--                                                        @csrf--}}
{{--                                                        <button onclick="return confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                                    </form>--}}
                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    <br>
                                    {{ $banners->links('admin.vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@include('admin.includes.footer')
