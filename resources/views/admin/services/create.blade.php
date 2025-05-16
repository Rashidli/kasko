@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('services.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Əlavə et</h4>
                    </div>
                    <div class="card-body">
                        <!-- Language Tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $lang }}"
                                       data-bs-toggle="tab" href="#content-{{ $lang }}" role="tab"
                                       aria-controls="content-{{ $lang }}"
                                       aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                        {{ strtoupper($lang) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content mt-3">
                            @foreach(['az', 'en', 'ru'] as $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                     id="content-{{ $lang }}" role="tabpanel" aria-labelledby="tab-{{ $lang }}">
                                    <div class="row">
                                        <!-- Title and Description -->
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Başlıq və Mətn</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq* {{ $lang }}</label>
                                                <input class="form-control" type="text"
                                                       value="{{old($lang . '_title')}}" name="{{ $lang }}_title">
                                                @if($errors->first("{$lang}_title"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Text* {{ $lang }}</label>
                                                <textarea id="editor_{{ $lang }}" class="form-control"
                                                          name="{{ $lang }}_description">{{old($lang . '_description')}}</textarea>
                                                @if($errors->first("{$lang}_description"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Text 2* {{ $lang }}</label>
                                                <textarea id="editor1_{{$lang}}" class="form-control"
                                                          name="{{ $lang }}_short_description">{{old($lang . '_short_description')}}</textarea>
                                                @if($errors->first("{$lang}_short_description"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_short_description") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Image Tags -->
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Şəkil Etiketləri</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Title tag {{ $lang }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_title"
                                                       value="{{old($lang . '_img_title')}}">
                                                @if($errors->first("{$lang}_img_title"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_img_title") }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Alt tag {{ $lang }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_img_alt"
                                                       value="{{old($lang . '_img_alt')}}">
                                                @if($errors->first("{$lang}_img_alt"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_img_alt") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Meta Tags -->
                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Başlıqlar</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta title {{ $lang }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_meta_title"
                                                       value="{{ old("{$lang}_meta_title") }}">
                                                @if($errors->first("{$lang}_meta_title"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_meta_title") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Təsvirlər</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta description {{ $lang }}</label>
                                                <textarea class="form-control"
                                                          name="{{ $lang }}_meta_description">{{ old("{$lang}_meta_description") }}</textarea>
                                                @if($errors->first("{$lang}_meta_description"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_meta_description") }}</small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <h5 class="mb-3">Meta Açar Sözlər</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Meta keywords {{ $lang }}</label>
                                                <textarea class="form-control"
                                                          name="{{ $lang }}_meta_keywords">{{ old("{$lang}_meta_keywords") }}</textarea>
                                                @if($errors->first("{$lang}_meta_keywords"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_meta_keywords") }}</small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="mb-3">Success mesajları</h5>
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq* {{ $lang }} (iş vaxtı)</label>
                                                <input class="form-control" type="text"
                                                       value="{{old($lang . '_work_message')}}" name="{{ $lang }}_work_message">
                                                @if($errors->first("{$lang}_work_message"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_work_message") }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Text* {{ $lang }} (iş vaxtı)</label>
                                                <textarea class="form-control"
                                                          name="{{ $lang }}_work_text">{{old($lang . '_work_text')}}</textarea>
                                                @if($errors->first("{$lang}_work_text"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_work_text") }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq* {{ $lang }} (qeyri iş vaxtı)</label>
                                                <input class="form-control" type="text"
                                                       value="{{old($lang . '_off_message')}}" name="{{ $lang }}_off_message">
                                                @if($errors->first("{$lang}_off_message"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_off_message") }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label class="col-form-label">Text* {{ $lang }} (qeyri iş vaxtı)</label>
                                                <textarea id="editor_{{ $lang }}" class="form-control"
                                                          name="{{ $lang }}_off_text">{{old($lang . '_off_text')}}</textarea>
                                                @if($errors->first("{$lang}_off_text"))
                                                    <small
                                                        class="form-text text-danger">{{ $errors->first("{$lang}_off_text") }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Other Fields -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label">Kateqoriya</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="col-form-label">Form</label>
                                <select name="form_id" class="form-control">
                                    @foreach($forms as $form)
                                        <option value="{{$form->id}}">
                                            {{$form->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label">İcon*(20-20)</label>
                                <input class="form-control" type="file" name="icon">
                                @if($errors->first('icon'))
                                    <small class="form-text text-danger">{{ $errors->first('icon') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="col-form-label">Şəkil*(1240-500)</label>
                                <input class="form-control" type="file" name="image">
                                @if($errors->first('image'))
                                    <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4 text-end">
                            <button class="btn btn-primary mt-4">Yadda saxla</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
@include('admin.includes.footer')
