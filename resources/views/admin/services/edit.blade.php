@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <form action="{{ route('services.update', $service->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('services.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $service->translate('az')?->title }}</li>
                            </ol>
                        </nav>

                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $lang }}" data-bs-toggle="tab" href="#content-{{ $lang }}" role="tab" aria-controls="content-{{ $lang }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ strtoupper($lang) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content mt-3">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="content-{{ $lang }}" role="tabpanel" aria-labelledby="tab-{{ $lang }}">
                                    <div class="row">
                                        <!-- Title Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Başlıq</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Başlıq* {{ strtoupper($lang) }}</label>
                                                        <input class="form-control" type="text" name="{{ $lang }}_title" value="{{ $service->translate($lang)->title }}">
                                                        @if($errors->first($lang.'_title'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_title') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Mətn</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Text* {{ strtoupper($lang) }}</label>
                                                        <textarea id="editor_{{ $lang }}" class="form-control" name="{{ $lang }}_description">{{ $service->translate($lang)->description }}</textarea>
                                                        @if($errors->first($lang.'_description'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_description') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Mətn 2</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Text 2* {{ strtoupper($lang) }}</label>
                                                        <textarea id="editor1_{{$lang}}" class="form-control" name="{{ $lang }}_short_description">{{ $service->translate($lang)->short_description }}</textarea>
                                                        @if($errors->first($lang.'_short_description'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_short_description') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Alt & Title Tags Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Alt və Title Taglar</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Alt tag {{ strtoupper($lang) }}</label>
                                                        <input class="form-control" type="text" name="{{ $lang }}_img_alt" value="{{ $service->translate($lang)->img_alt }}">
                                                        @if($errors->first($lang.'_img_alt'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_img_alt') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Title tag {{ strtoupper($lang) }}</label>
                                                        <input class="form-control" type="text" name="{{ $lang }}_img_title" value="{{ $service->translate($lang)->img_title }}">
                                                        @if($errors->first($lang.'_img_title'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_img_title') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Meta Tags Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Meta Taglar</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Meta title {{ strtoupper($lang) }}</label>
                                                        <input class="form-control" type="text" name="{{ $lang }}_meta_title" value="{{ $service->translate($lang)->meta_title }}">
                                                        @if($errors->first($lang.'_meta_title'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_meta_title') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Meta description {{ strtoupper($lang) }}</label>
                                                        <textarea class="form-control" name="{{ $lang }}_meta_description">{{ $service->translate($lang)->meta_description }}</textarea>
                                                        @if($errors->first($lang.'_meta_description'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_meta_description') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Meta keywords {{ strtoupper($lang) }}</label>
                                                        <textarea class="form-control" name="{{ $lang }}_meta_keywords">{{ $service->translate($lang)->meta_keywords }}</textarea>
                                                        @if($errors->first($lang.'_meta_keywords'))
                                                            <small class="form-text text-danger">{{ $errors->first($lang.'_meta_keywords') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Other Fields (Non-translatable) -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Select</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="col-form-label">Kateqoriya</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{ $service->category_id == $category->id ? 'selected' : '' }}>
                                                        {{$category->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label">Form</label>
                                            <select name="form_id" class="form-control">
                                                @foreach($forms as $form)
                                                    <option value="{{$form->id}}" {{ $service->form_id == $form->id ? 'selected' : '' }}>
                                                        {{$form->title}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Şəkil</div>
                                    <div class="card-body">
                                        <div class="mb-3 text-center">
                                            <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $service->image) }}" class="uploaded_image" alt="{{ $service->image }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Şəkil*(1240-500)</label>
                                            <input type="file" name="image" class="form-control">
                                            @if($errors->first('image'))
                                                <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Status</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="col-form-label">Aktiv?</label>
                                            <select name="is_active" class="form-control">
                                                <option value="1" {{ $service->is_active == true ? 'selected' : '' }}>Aktiv</option>
                                                <option value="0" {{ $service->is_active == false ? 'selected' : '' }}>Deaktiv</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Buttons -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Yadda saxla</button>
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
