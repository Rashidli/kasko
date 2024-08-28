@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('mains.update', $main->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('mains.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $main->translate('az')?->title }}</li>
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
                                        <label class="col-form-label">Başlıq {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ $main->translate($lang)->title }}">
                                        @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Text {{ strtoupper($lang) }}</label>
                                        <textarea class="form-control" name="{{ $lang }}_description">{{ $main->translate($lang)->description }}</textarea>
                                        @if($errors->first("{$lang}_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ $main->translate($lang)->img_alt }}">
                                        @if($errors->first("{$lang}_img_alt")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ $main->translate($lang)->img_title }}">
                                        @if($errors->first("{$lang}_img_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small> @endif
                                    </div>

                                </div>
                            @endforeach

                            <!-- Global Fields -->
                            <div class="mb-3">
                                <label class="col-form-label">Link</label>
                                <input class="form-control" type="text" name="link" value="{{ $main->link }}">
                                @if($errors->first('link')) <small class="form-text text-danger">{{ $errors->first('link') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Tarix</label>
                                <input class="form-control" type="date" name="date" value="{{ $main->date }}">
                                @if($errors->first('date')) <small class="form-text text-danger">{{ $errors->first('date') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Şəkil(1440-600)</label>
                                <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $main->image) }}" class="uploaded_image" alt="{{ $main->image }}">
                                <input type="file" name="image" class="form-control">
                                @if($errors->first('image')) <small class="form-text text-danger">{{ $errors->first('image') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Mobil şəkil(375-480)</label>
                                <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $main->mobile_image) }}" class="uploaded_image" alt="{{ $main->mobile_image }}">
                                <input type="file" name="mobile_image" class="form-control">
                                @if($errors->first('mobile_image')) <small class="form-text text-danger">{{ $errors->first('mobile_image') }}</small> @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Active</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ $main->is_active ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$main->is_active ? 'selected' : '' }}>Deactive</option>
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
