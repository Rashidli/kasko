@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('contents.update', $content->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Dəyişdir</h4>
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
                                                <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ old("{$lang}_title", $content->translate($lang)?->title) }}">
                                                @if($errors->first("{$lang}_title"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-form-label">Text* {{ strtoupper($lang) }}</label>
                                                <textarea id="editor_{{ $lang }}" class="form-control" name="{{ $lang }}_description">{{ old("{$lang}_description", $content->translate($lang)?->description) }}</textarea>
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
                                                <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ old("{$lang}_img_title", $content->translate($lang)?->img_title) }}">
                                                @if($errors->first("{$lang}_img_title"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small>
                                                @endif
                                            </div>

                                            <div class="mb-3">
                                                <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ old("{$lang}_img_alt", $content->translate($lang)?->img_alt) }}">
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
                                                <input class="form-control" type="text" name="{{ $lang }}_meta_title" value="{{ old("{$lang}_meta_title", $content->translate($lang)?->meta_title) }}">
                                                @if($errors->first("{$lang}_meta_title"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_title") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Təsvirlər</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta description {{ strtoupper($lang) }}</label>
                                                <textarea class="form-control" name="{{ $lang }}_meta_description">{{ old("{$lang}_meta_description", $content->translate($lang)?->meta_description) }}</textarea>
                                                @if($errors->first("{$lang}_meta_description"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_description") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Açar Sözlər</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta keywords {{ strtoupper($lang) }}</label>
                                                <textarea class="form-control" name="{{ $lang }}_meta_keywords">{{ old("{$lang}_meta_keywords", $content->translate($lang)?->meta_keywords) }}</textarea>
                                                @if($errors->first("{$lang}_meta_keywords"))
                                                    <small class="form-text text-danger">{{ $errors->first("{$lang}_meta_keywords") }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Image Section -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Şəkil*(820-400)</div>
                                    <div class="card-body">
                                        <div class="mb-3 text-center">
                                            @if($content->image)
                                                <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $content->image) }}" class="uploaded_image" alt="{{ $content->image }}">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Şəkil:</label>
                                            <input type="file" name="image" class="form-control">
                                            @if($errors->first('image'))
                                                <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status Section -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Status</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="col-form-label">Aktiv?</label>
                                            <select name="is_active" class="form-control">
                                                <option value="1" {{ $content->is_active == true ? 'selected' : '' }}>Aktiv</option>
                                                <option value="0" {{ $content->is_active == false ? 'selected' : '' }}>Deaktiv</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="mb-3 text-end mt-4">
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
