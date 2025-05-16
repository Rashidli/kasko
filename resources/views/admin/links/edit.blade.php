@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <form action="{{ route('links.update', $link->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf

                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('links.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $link->translate('az')?->title }}</li>
                            </ol>
                        </nav>

                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs" id="langTabs" role="tablist">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $lang }}-tab" data-bs-toggle="tab" href="#{{ $lang }}" role="tab" aria-controls="{{ $lang }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ strtoupper($lang) }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content mt-3" id="langTabsContent">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">

                                    <div class="mb-3">
                                        <label class="col-form-label">Başlıq* {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ $link->translate($lang)?->title }}">
                                        @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                    </div>
{{--                                    <div class="mb-3">--}}
{{--                                        <label class="col-form-label">Slug* {{ strtoupper($lang) }}</label>--}}
{{--                                        <input class="form-control" type="text" name="{{ $lang }}_slug" value="{{ $link->translate($lang)?->slug }}">--}}
{{--                                        @if($errors->first("{$lang}_slug")) <small class="form-text text-danger">{{ $errors->first("{$lang}_slug") }}</small> @endif--}}
{{--                                    </div>--}}

                                    <div class="mb-3">
                                        <label class="col-form-label">Meta title {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_meta_title" value="{{ $link->translate($lang)?->meta_title }}">
                                        @if($errors->first("{$lang}_meta_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_title") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Meta description {{ strtoupper($lang) }}</label>
                                        <textarea class="form-control" name="{{ $lang }}_meta_description">{{ $link->translate($lang)?->meta_description }}</textarea>
                                        @if($errors->first("{$lang}_meta_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_description") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Meta keywords {{ strtoupper($lang) }}</label>
                                        <textarea class="form-control" name="{{ $lang }}_meta_keywords">{{ $link->translate($lang)?->meta_keywords }}</textarea>
                                        @if($errors->first("{$lang}_meta_keywords")) <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_keywords") }}</small> @endif
                                    </div>

                                </div>
                            @endforeach

                            <div class="mb-3">
                                <label class="col-form-label">Link*</label>
                                <textarea class="form-control" name="description">{{ $link->description }}</textarea>
                                @if($errors->first('description')) <small class="form-text text-danger">{{ $errors->first('description') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Active</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ $link->is_active == true ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $link->is_active == false ? 'selected' : '' }}>Deactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-primary">Yadda saxla</button>
                            </div>

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
