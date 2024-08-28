@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('abouts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Əlavə et</h4>

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
                                        <div class="col-md-6">
                                            <!-- Short Title -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Qısa başlıq {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_short_title">
                                                @if($errors->first("{$lang}_short_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_short_title") }}</small> @endif
                                            </div>

                                            <!-- Title -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_title">
                                                @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                            </div>

                                            <!-- Description -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Text {{ strtoupper($lang) }}</label>
                                                <textarea id="editor_{{$lang}}" class="form-control" name="{{ $lang }}_description"></textarea>
                                                @if($errors->first("{$lang}_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small> @endif
                                            </div>

                                            <!-- Image -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Şəkil(1192-500)</label>
                                                <input class="form-control" type="file" name="image">
                                                @if($errors->first('image')) <small class="form-text text-danger">{{ $errors->first('image') }}</small> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Title Tag -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_title">
                                                @if($errors->first("{$lang}_img_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small> @endif
                                            </div>

                                            <!-- Alt Tag -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_alt">
                                                @if($errors->first("{$lang}_img_alt")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-3">
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
