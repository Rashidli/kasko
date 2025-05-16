@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('messages.store') }}" method="post" enctype="multipart/form-data">
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
                                        <!-- Title Section -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Başlıq {{ strtoupper($lang) }}</label>
                                                <input class="form-control" type="text" name="{{ $lang }}_title">
                                                @if($errors->first("{$lang}_title")) <small class="form-text text-danger">{{ $errors->first("{$lang}_title") }}</small> @endif
                                            </div>
                                        </div>

                                        <!-- Description Section -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Text {{ strtoupper($lang) }}</label>
                                                <textarea class="form-control" name="{{ $lang }}_description"></textarea>
                                                @if($errors->first("{$lang}_description")) <small class="form-text text-danger">{{ $errors->first("{$lang}_description") }}</small> @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Schedule Section -->
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="mt-4">Cədvəl</h5>
                                <div id="schedule-container">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="day" class="form-label">Gün</label>
                                            <select class="form-control" name="schedules[0][day]">
                                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                    <option value="{{ $day }}">{{ $day }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="start_time" class="form-label">Başlama Saatı</label>
                                            <input type="time" class="form-control" name="schedules[0][start_time]">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="end_time" class="form-label">Bitmə Saatı</label>
                                            <input type="time" class="form-control" name="schedules[0][end_time]">
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-success" id="add-schedule">+</button>
                                        </div>
                                    </div>
                                </div>
                                @if($errors->has('schedules'))
                                    <small class="form-text text-danger">{{ $errors->first('schedules') }}</small>
                                @endif
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 text-end">
                                    <button class="btn btn-primary">Yadda saxla</button>
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

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
    let scheduleIndex = 1;

    document.getElementById('add-schedule').addEventListener('click', function () {
        const container = document.getElementById('schedule-container');
        const row = document.createElement('div');
        row.classList.add('row', 'mb-3');

        row.innerHTML = `
            <div class="col-md-4">
                <label for="day" class="form-label">Gün</label>
                <select class="form-control" name="schedules[${scheduleIndex}][day]">
                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
        <option value="{{ $day }}">{{ $day }}</option>
                    @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label for="start_time" class="form-label">Başlama Saatı</label>
        <input type="time" class="form-control" name="schedules[${scheduleIndex}][start_time]">
            </div>
            <div class="col-md-3">
                <label for="end_time" class="form-label">Bitmə Saatı</label>
                <input type="time" class="form-control" name="schedules[${scheduleIndex}][end_time]">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-schedule">-</button>
            </div>
        `;

        container.appendChild(row);
        scheduleIndex++;

        // Add event listener to remove button
        row.querySelector('.remove-schedule').addEventListener('click', function () {
            row.remove();
        });
    });
</script>
