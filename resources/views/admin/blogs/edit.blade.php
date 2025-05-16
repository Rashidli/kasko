@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <form action="{{ route('blogs.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Siyahı</a></li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{ $blog->translate('az')?->title }}</li>
                            </ol>
                        </nav>

                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs" id="langTabs" role="tablist">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ $lang }}-tab"
                                       data-bs-toggle="tab" href="#{{ $lang }}" role="tab" aria-controls="{{ $lang }}"
                                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ strtoupper($lang) }}</a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content" id="langTabsContent">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $lang }}"
                                     role="tabpanel" aria-labelledby="{{ $lang }}-tab">
                                    <div class="row">
                                        <!-- Title Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Başlıq</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Başlıq* {{ $lang }}</label>
                                                        <input class="form-control" type="text" name="{{ $lang }}_title"
                                                               value="{{ $blog->translate($lang)->title }}">
                                                        @if($errors->first($lang.'_title'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_title') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Qısa mətn</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Qısa mətn* {{ $lang }}</label>
                                                        <input class="form-control" type="text"
                                                               name="{{ $lang }}_short_description"
                                                               value="{{ $blog->translate($lang)->short_description }}">
                                                        @if($errors->first($lang.'_short_description'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_short_description') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Qısa text</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Qısa text* {{ $lang }}</label>
                                                        <input class="form-control" type="text"
                                                               name="{{ $lang }}_short_text"
                                                               value="{{ $blog->translate($lang)->short_text }}">
                                                        @if($errors->first($lang.'_short_text'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_short_text') }}</small>
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
                                                        <label class="col-form-label">Text* {{ $lang }}</label>
                                                        <textarea id="editor_{{ $lang }}" class="form-control"
                                                                  name="{{ $lang }}_description">{{ $blog->translate($lang)->description }}</textarea>
                                                        @if($errors->first($lang.'_description'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_description') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- Alt & Title Tags Section -->
                                        <div class="col-md-6">
                                            <div class="card mb-3">
                                                <div class="card-header">Alt və Title Taglar</div>
                                                <div class="card-body">
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Alt tag {{ $lang }}</label>
                                                        <input class="form-control" type="text"
                                                               name="{{ $lang }}_img_alt"
                                                               value="{{ $blog->translate($lang)->img_alt }}">
                                                        @if($errors->first($lang.'_img_alt'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_img_alt') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Title tag {{ $lang }}</label>
                                                        <input class="form-control" type="text"
                                                               name="{{ $lang }}_img_title"
                                                               value="{{ $blog->translate($lang)->img_title }}">
                                                        @if($errors->first($lang.'_img_title'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_img_title') }}</small>
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
                                                        <label class="col-form-label">Meta title {{ $lang }}</label>
                                                        <input class="form-control" type="text"
                                                               name="{{ $lang }}_meta_title"
                                                               value="{{ $blog->translate($lang)->meta_title }}">
                                                        @if($errors->first($lang.'_meta_title'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_meta_title') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Meta
                                                            description {{ $lang }}</label>
                                                        <textarea class="form-control"
                                                                  name="{{ $lang }}_meta_description">{{ $blog->translate($lang)->meta_description }}</textarea>
                                                        @if($errors->first($lang.'_meta_description'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_meta_description') }}</small>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="col-form-label">Meta keywords {{ $lang }}</label>
                                                        <textarea class="form-control"
                                                                  name="{{ $lang }}_meta_keywords">{{ $blog->translate($lang)->meta_keywords }}</textarea>
                                                        @if($errors->first($lang.'_meta_keywords'))
                                                            <small
                                                                class="form-text text-danger">{{ $errors->first($lang.'_meta_keywords') }}</small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <!-- Image Section -->
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Şəkil(780-480)</div>
                                    <div class="card-body">
                                        <div class="mb-3 text-center">
                                            <img style="width: 100px; height: 100px;"
                                                 src="{{ asset('storage/' . $blog->image) }}" class="uploaded_image"
                                                 alt="{{ $blog->image }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Şəkil*(780-480)</label>
                                            <input type="file" name="image" class="form-control">
                                            @if($errors->first('image'))
                                                <small
                                                    class="form-text text-danger">{{ $errors->first('image') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="col-md-6">--}}
                            {{--                                <div class="card mb-3">--}}
                            {{--                                    <div class="card-header">Banner(374-653)</div>--}}
                            {{--                                    <div class="card-body">--}}
                            {{--                                        <div class="mb-3 text-center">--}}
                            {{--                                            <img style="width: 100px; height: 100px;" src="{{ asset('storage/' . $blog->banner_desktop) }}" class="uploaded_image" alt="{{ $blog->banner_desktop }}">--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="form-group">--}}
                            {{--                                            <label>Banner*(374-653)</label>--}}
                            {{--                                            <input type="file" name="banner_desktop" class="form-control">--}}
                            {{--                                            @if($errors->first('banner_desktop'))--}}
                            {{--                                                <small class="form-text text-danger">{{ $errors->first('banner_desktop') }}</small>--}}
                            {{--                                            @endif--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="mb-3">
                                <label class="col-form-label">Yeni?</label>
                                <input type="checkbox" name="is_new" {{$blog->is_new ? 'checked' : ''}}>
                                @if($errors->first('is_new'))
                                    <small class="form-text text-danger">{{ $errors->first('is_new') }}</small>
                                @endif
                            </div>

                            <!-- Slider Section -->
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Slider(780-480)</div>
                                    <div class="card-body">
                                        @foreach($blog->sliders as $slider)
                                            <div class="image-container mb-2" data-slider-id="{{ $slider->id }}">
                                                <img style="width: 100px; height: 100px;"
                                                     src="{{ asset('storage/' . $slider->image) }}"
                                                     class="uploaded_image" alt="{{ $slider->image }}">
                                                <a class="btn btn-danger btn-sm"
                                                   href="{{ route('delete-slider-image', ['id' => $slider->id]) }}">Sil</a>
                                            </div>
                                        @endforeach
                                        <div class="form-group">
                                            <label>Yeni Şəkillər:</label>
                                            <input type="file" name="slider_images[]" multiple class="form-control">
                                            @if($errors->first('slider_images'))
                                                <small
                                                    class="form-text text-danger">{{ $errors->first('slider_images') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Services Section -->
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Xidmətlər</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="col-form-label">Xidmətlər</label>
                                            <select name="services[]" id="" multiple
                                                    class="form-control js-example-basic-single">
                                                @foreach($services as $service)
                                                    <option
                                                        value="{{$service->id}}" {{ $blog->services->contains($service->id) ? 'selected' : '' }}>{{$service->title}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->first('services'))
                                                <small
                                                    class="form-text text-danger">{{ $errors->first('services') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Section -->
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header">Status</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="active"
                                                       name="is_active"
                                                       value="1" {{ $blog->is_active == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="active">Active</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="inactive"
                                                       name="is_active"
                                                       value="0" {{ $blog->is_active == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="inactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.includes.footer')
