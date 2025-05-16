@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('mains.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">əlavə et</h4>

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
                                        <label class="col-form-label">Başlıq {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_title">
                                        @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Text {{ strtoupper($lang) }}</label>
                                        <textarea class="form-control" name="{{ $lang }}_description"></textarea>
                                        @if($errors->first("{$lang}_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_img_title">
                                        @if($errors->first("{$lang}_img_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_img_alt">
                                        @if($errors->first("{$lang}_img_alt")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small> @endif
                                    </div>

                                </div>
                            @endforeach
                                <div class="mb-3">
                                    <label class="col-form-label">Başlıq tagi h1 yoxsa h2 (yalnız biri h1 ola bilər)</label>
                                    <select name="type" class="form-control">
                                        <option value="h2">H2</option>
                                        <option value="h1">H1</option>
                                    </select>
                                </div>
                            <div class="mb-3">
                                <label class="col-form-label">Link</label>
                                <input class="form-control" type="text" name="link">
                                @if($errors->first('link')) <small class="form-text text-danger">{{ $errors->first('link') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Tarix</label>
                                <input class="form-control" type="date" name="date">
                                @if($errors->first('date')) <small class="form-text text-danger">{{ $errors->first('date') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Şəkil (1440-600)</label>
                                <input class="form-control" type="file" name="image">
                                @if($errors->first('image')) <small class="form-text text-danger">{{ $errors->first('image') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Mobil şəkil(375-480)</label>
                                <input class="form-control" type="file" name="mobile_image">
                                @if($errors->first('mobile_image')) <small class="form-text text-danger">{{ $errors->first('mobile_image') }}</small> @endif
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
