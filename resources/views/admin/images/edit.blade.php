@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('images.update', $image->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$image->title}}</h4>
                        <div class="row">
                            <div class="col-6">
                                <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                                    <ol class="breadcrumb bg-light p-3 rounded">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('images.index') }}">Siyahı</a></li>
                                    </ol>
                                </nav>
                                <ul class="nav nav-tabs" id="langTabs" role="tablist">
                                    @foreach(['az', 'en', 'ru'] as $lang)
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $lang }}-tab" data-bs-toggle="tab" href="#{{ $lang }}" role="tab" aria-controls="{{ $lang }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ strtoupper($lang) }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="tab-content" id="langTabsContent">
                                    @foreach(['az', 'en', 'ru'] as $lang)
                                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">
                                            <!-- Alt Tag -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ $image->translate($lang)?->img_alt }}">
                                                @if($errors->first("{$lang}_img_alt")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small> @endif
                                            </div>

                                            <!-- Title Tag -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ $image->translate($lang)?->img_title }}">
                                                @if($errors->first("{$lang}_img_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small> @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <img style="width: 100px; height: 100px;" src="{{asset('storage/' . $image->image)}}" class="uploaded_image" alt="{{$image->image}}">
                                    <div class="form-group">
                                        <label>Logo(148x34)</label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                    @if($errors->first('image')) <small class="form-text text-danger">{{$errors->first('image')}}</small> @endif
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
