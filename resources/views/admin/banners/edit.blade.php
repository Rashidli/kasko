@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('banners.update', $banner->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
{{--                        <h4 class="card-title">{{$banner->title}}</h4>--}}
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('banners.index') }}">Siyahı</a></li>
{{--                                <li class="breadcrumb-item active" aria-current="page">{{ $about->translate('az')?->title }}</li>--}}
                            </ol>
                        </nav>
                        <div class="row">
                            <div class="col-6">

                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="link" class="form-control" value="{{$banner->link}}">
                                    </div>
                                    @if($errors->first('link')) <small class="form-text text-danger">{{$errors->first('link')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <img style="width: 100px; height: 100px;" src="{{asset('storage/' . $banner->banner)}}" class="uploaded_image" alt="{{$banner->banner}}">
                                    <div class="form-group">
                                        <label>Banner*(374-653)</label>
                                        <input type="file" name="banner" class="form-control">
                                    </div>
                                    @if($errors->first('banner')) <small class="form-text text-danger">{{$errors->first('banner')}}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Active</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ $banner->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$banner->is_active ? 'selected' : '' }}>Deactive</option>
                                    </select>
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
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor_az' ) )
        .catch( error => {
            console.error( error );
        } );

</script>
