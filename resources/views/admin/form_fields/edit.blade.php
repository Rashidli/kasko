@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('forms.form_fields.update', [$form->id, $form_field->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Form Field</h4>

                        <!-- Non-Translatable Fields -->
                        <div class="mb-3">
                            <label class="col-form-label">Name (Nümunə: full_name) sözlər balaca hərflər altdan xəttlə yazılmalıdı</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name', $form_field->name) }}">
                            @if($errors->first('name')) <small class="form-text text-danger">{{ $errors->first('name') }}</small> @endif
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="text" {{ old('type', $form_field->type) == 'text' ? 'selected' : '' }}>Text</option>
                                <option value="email" {{ old('type', $form_field->type) == 'email' ? 'selected' : '' }}>Email</option>
                                <option value="number" {{ old('type', $form_field->type) == 'number' ? 'selected' : '' }}>Number</option>
                                <option value="date" {{ old('type', $form_field->type) == 'date' ? 'selected' : '' }}>Date</option>
                                <option value="select" {{ old('type', $form_field->type) == 'select' ? 'selected' : '' }}>Select</option>
                            </select>
                            @if($errors->first('type')) <small class="form-text text-danger">{{ $errors->first('type') }}</small> @endif
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Is Required</label>
                            <select name="is_required" class="form-control">
                                <option value="1" {{ old('is_required', $form_field->is_required) == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ old('is_required', $form_field->is_required) == 0 ? 'selected' : '' }}>No</option>
                            </select>
                            @if($errors->first('is_required')) <small class="form-text text-danger">{{ $errors->first('is_required') }}</small> @endif
                        </div>

                        <div class="mb-3">
                            <label class="col-form-label">Is Active</label>
                            <select name="is_active" class="form-control">
                                <option value="1" {{ old('is_active', $form_field->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('is_active', $form_field->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @if($errors->first('is_active')) <small class="form-text text-danger">{{ $errors->first('is_active') }}</small> @endif
                        </div>

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
                                    <div class="mb-3">
                                        <label class="col-form-label">Placeholder ({{ strtoupper($lang) }})</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_placeholder" value="{{ old("{$lang}_placeholder", $form_field->translate($lang)->placeholder) }}">
                                        @if($errors->first("{$lang}_placeholder")) <small class="form-text text-danger">{{ $errors->first("{$lang}_placeholder") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Label ({{ strtoupper($lang) }})</label>
                                        <input class="form-control" type="text" name="{{ $lang }}_label" value="{{ old("{$lang}_label", $form_field->translate($lang)->label) }}">
                                        @if($errors->first("{$lang}_label")) <small class="form-text text-danger">{{ $errors->first("{$lang}_label") }}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Options ({{ strtoupper($lang) }}) (sözlər vergül ilə ayrılmalıdır)(type select seçilibsə bu hissə doldurulur)</label>
                                        <textarea class="form-control" name="{{ $lang }}_options">{{ old("{$lang}_options", $form_field->translate($lang)->options) }}</textarea>
                                        @if($errors->first("{$lang}_options")) <small class="form-text text-danger">{{ $errors->first("{$lang}_options") }}</small> @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Update Button -->
                        <div class="mb-3">
                            <button class="btn btn-primary">Update</button>
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
