@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('singles.update', $single->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $single->translate('en')->title }}</h4>
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('singles.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $single->translate('az')?->title }}</li>
                            </ol>
                        </nav>
                        <!-- Tabs Navigation -->
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
                                        <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ old("{$lang}_title", $single->translate($lang)->title) }}">
                                        @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                    </div>

{{--                                    <div class="mb-3">--}}
{{--                                        <label class="col-form-label">Slug {{ strtoupper($lang) }}</label>--}}
{{--                                        <input class="form-control" type="text" name="{{ $lang }}_slug" value="{{ old("{$lang}_slug", $single->translate($lang)->slug) }}">--}}
{{--                                        @if($errors->first("{$lang}_slug")) <small class="form-text text-danger">{{ $errors->first("{$lang}_slug") }}</small> @endif--}}
{{--                                    </div>--}}

                                    <div class="mb-3">
                                        <label class="col-form-label">Meta title {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_seo_title" value="{{ old("{$lang}_seo_title", $single->translate($lang)->seo_title) }}">
                                        @if($errors->first("{$lang}_seo_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_seo_title") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Meta description {{ strtoupper($lang) }}</label>
                                        <textarea class="form-control" name="{{ $lang }}_seo_description">{{ old("{$lang}_seo_description", $single->translate($lang)->seo_description) }}</textarea>
                                        @if($errors->first("{$lang}_seo_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_seo_description") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Meta keywords {{ strtoupper($lang) }}</label>
                                        <textarea class="form-control" name="{{ $lang }}_seo_keywords">{{ old("{$lang}_seo_keywords", $single->translate($lang)->seo_keywords) }}</textarea>
                                        @if($errors->first("{$lang}_seo_keywords")) <small class="form-text text-danger">{{ $errors->first("{$lang}_seo_keywords") }}</small> @endif
                                    </div>

                                </div>
                            @endforeach

                            <!-- Non-language specific fields -->
                            <div class="mb-3">
                                <label class="col-form-label">Type</label>
                                <input readonly class="form-control" type="text" name="type" value="{{ $single->type }}">
                                @if($errors->first('type')) <small class="form-text text-danger">{{ $errors->first('type') }}</small> @endif
                            </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Active</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ $single->is_active  ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$single->is_active ? 'selected' : '' }}>Deactive</option>
                                    </select>
                                </div>

                                @if($single->type == 'casco_calculator')
                                    <!-- İlləri göstər və yenilə -->
                                    <div class="mb-3">
                                        <label class="col-form-label">İllər</label>
                                        <select name="years[]" class="form-control js-example-basic-single" multiple>
                                            @foreach($single->years ?? [] as $year)
                                                <option value="{{ $year }}" selected>{{ $year }}</option>
                                            @endforeach
                                        </select>
                                        <small class="form-text text-muted">Birdən çox il seçmək üçün CTRL düyməsini basıb saxlayın.</small>
                                    </div>

                                    <!-- Yeni İl Əlavə Et -->
                                    <div class="mb-3">
                                        <label class="col-form-label">Yeni İl Əlavə Et</label>
                                        <input type="number" class="form-control" id="newYear" placeholder="Məsələn: 2025" min="1900" max="{{ date('Y') }}">
                                        <button type="button" class="btn btn-primary mt-2" onclick="addYear()">Əlavə Et</button>
                                    </div>
                                @endif

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

<script>
    function addYear() {
        const newYearInput = document.getElementById('newYear');
        const year = newYearInput.value;
        const select = document.querySelector('select[name="years[]"]');

        if (year && !Array.from(select.options).some(opt => opt.value == year)) {
            const option = new Option(year, year, true, true);
            select.add(option);
            newYearInput.value = '';
        }
    }
</script>
