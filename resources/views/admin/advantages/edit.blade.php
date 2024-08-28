@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('advantages.update', $advantage->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('advantages.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $advantage->translate('az')?->title }}</li>
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

                        <div class="tab-content" id="langTabsContent">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Title -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ $advantage->translate($lang)->title }}">
                                                @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                            </div>

                                            <!-- Description -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Text {{ strtoupper($lang) }}</label>
                                                <textarea class="form-control" name="{{ $lang }}_description">{{ $advantage->translate($lang)->description }}</textarea>
                                                @if($errors->first("{$lang}_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small> @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Image Title Tag -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ $advantage->translate($lang)->img_title }}">
                                                @if($errors->first("{$lang}_img_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small> @endif
                                            </div>

                                            <!-- Image Alt Tag -->
                                            <div class="mb-3">
                                                <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ $advantage->translate($lang)->img_alt }}">
                                                @if($errors->first("{$lang}_img_alt")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-3">
                            <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $advantage->image) }}" class="uploaded_image" alt="{{ $advantage->image }}">
                            <div class="form-group">
                                <label>Şəkil(90x90)</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            @if($errors->first('image')) <small class="form-text text-danger">{{ $errors->first('image') }}</small> @endif
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary">Yadda saxla</button>
                        </div>

                        <!-- Active Status -->
                        <div class="mb-3">
                            <label class="col-form-label">Active</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ $advantage->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$advantage->is_active ? 'selected' : '' }}>Deactive</option>
                            </select>
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
