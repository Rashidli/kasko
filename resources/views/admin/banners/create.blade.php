@include('admin.includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('banners.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add banner</h4>
                            <div class="row">
                                <div class="col-6">

                                    <div class="mb-3">
                                        <label class="col-form-label">Link</label>
                                        <input class="form-control" type="text" name="link">
                                        @if($errors->first('link')) <small class="form-text text-danger">{{$errors->first('link')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Banner*(374-653)</label>
                                        <input class="form-control" type="file" name="banner">
                                        @if($errors->first('banner')) <small class="form-text text-danger">{{$errors->first('banner')}}</small> @endif
                                    </div>

                                    <div class="mb-3">

                                        <button class="btn btn-primary">Yadda saxla</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@include('admin.includes.footer')

