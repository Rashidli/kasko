@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('partners.update', $partner->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $partner->translate('az')?->title }}</li>
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
                                        <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ $partner->translate($lang)?->img_title }}">
                                        @if($errors->first("{$lang}_img_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ $partner->translate($lang)?->img_alt }}">
                                        @if($errors->first("{$lang}_img_alt")) <small class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small> @endif
                                    </div>

                                </div>
                            @endforeach

                            <!-- Global Fields -->
                            <div class="mb-3">
                                <label class="col-form-label">Şəkil(140x70)</label>
                                <input class="form-control" type="file" name="image">
                                @if($errors->first('image')) <small class="form-text text-danger">{{ $errors->first('image') }}</small> @endif
                                @if($partner->image)
                                    <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $partner->image) }}" class="uploaded_image" alt="{{ $partner->image }}">
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Active</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ $partner->is_active == true ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $partner->is_active == false ? 'selected' : '' }}>Deactive</option>
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
