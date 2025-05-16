@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('contents.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Əlavə et</h4>
                    </div>
                    <div class="card-body">
                        <!-- Language Tabs -->
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
                                    <div class="row">
                                        <!-- Content for Title and Description -->
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Başlıq və Mətn</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq* {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ old("{$lang}_title") }}">
                                                @if($errors->first("{$lang}_title"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small>
                                                @endif
                                            </div>

{{--                                            <div class="mb-3">--}}
{{--                                                <label class="col-form-label">Slug* {{ strtoupper($lang) }}</label>--}}
{{--                                                <input class="form-control" type="text" name="{{ $lang }}_slug" value="{{ old("{$lang}_slug") }}">--}}
{{--                                                @if($errors->first("{$lang}_slug"))--}}
{{--                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_slug") }}</small>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}

                                            <div class="mb-3">
                                                <label class="col-form-label">Text* {{ strtoupper($lang) }}</label>
                                                <textarea id="editor_{{ $lang }}" class="form-control" name="{{ $lang }}_description">{{ old("{$lang}_description") }}</textarea>
                                                @if($errors->first("{$lang}_description"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Content for Image Tags -->
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Şəkil Etiketləri</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ old("{$lang}_img_title") }}">
                                                @if($errors->first("{$lang}_img_title"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ old("{$lang}_img_alt") }}">
                                                @if($errors->first("{$lang}_img_alt"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Meta Tags Section for Each Language -->
                                    <div class="row mt-3">
                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Başlıqlar</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta title {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_meta_title" value="{{ old("{$lang}_meta_title") }}">
                                                @if($errors->first("{$lang}_meta_title"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_title") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Təsvirlər</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta description {{ strtoupper($lang) }}</label>
                                                <textarea class="form-control" name="{{ $lang }}_meta_description">{{ old("{$lang}_meta_description") }}</textarea>
                                                @if($errors->first("{$lang}_meta_description"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_description") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Açar Sözlər</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta keywords {{ strtoupper($lang) }}</label>
                                                <textarea class="form-control" name="{{ $lang }}_meta_keywords">{{ old("{$lang}_meta_keywords") }}</textarea>
                                                @if($errors->first("{$lang}_meta_keywords"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_keywords") }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label">Button link</label>
                                        <input class="form-control" type="text" name="link">
                                        @if($errors->first('link'))
                                            <small class="form-text text-danger">{{ $errors->first('link') }}</small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="col-form-label">Şəkil*(820-400)</label>
                                        <input class="form-control" type="file" name="image">
                                        @if($errors->first('image'))
                                            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                                        @endif
                                    </div>
                                    <div class="mb-3 text-end">
                                        <button class="btn btn-primary">Yadda saxla</button>
                                    </div>
                                </div>
                        </div>

                        <div class="mb-3 mt-4 text-end">
                            <button class="btn btn-primary">Yadda saxla</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.includes.footer')

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<!-- Include your editor script if necessary -->
