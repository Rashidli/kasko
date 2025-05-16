@include('admin.includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('contact_socials.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add contact</h4>
                            <div class="row">
                                <div class="col-6">
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
                                                <div class="mb-3">
                                                    <label class="col-form-label">Text {{ strtoupper($lang) }}</label>
                                                    <input class="form-control" type="text" name="{{ $lang }}_title">
                                                    @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label">Link</label>
                                        <input class="form-control" type="text" name="link">
                                        @if($errors->first('link')) <small class="form-text text-danger">{{$errors->first('link')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Icon (32x32)</label>
                                        <input class="form-control" type="file" name="image">
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
