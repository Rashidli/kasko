@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('messages.store') }}" method="post" enctype="multipart/form-data">
{{--                {{ method_field('PUT') }}--}}
                @csrf
                <div class="card">
                    <div class="card-body">

                        <div class="row mb-3">
                            @foreach($schedules as $index => $schedule)
                                <div class="schedule-row row mb-3">
                                    <div class="col-md-4">
                                        <label for="day" class="form-label">Gün</label>
                                        <select class="form-control" name="schedules[{{ $index }}][day]">
                                            <option value="none" {{ $schedule->day === 'none' ? 'selected' : '' }}>Heç
                                                bir gün
                                            </option>
                                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                <option
                                                    value="{{ $day }}" {{ $schedule->day === $day ? 'selected' : '' }}>{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="start_time" class="form-label">Başlama Saatı</label>
                                        <input type="time" class="form-control"
                                               name="schedules[{{ $index }}][start_time]"
                                               value="{{ $schedule->start_time }}"
                                            {{ $schedule->day === 'none' ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="end_time" class="form-label">Bitmə Saatı</label>
                                        <input type="time" class="form-control"
                                               name="schedules[{{ $index }}][end_time]"
                                               value="{{ $schedule->end_time }}"
                                            {{ $schedule->day === 'none' ? 'disabled' : '' }}>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger remove-schedule">Sil</button>
                                    </div>
                                </div>
                            @endforeach


                            <div id="new-schedule-template" class="schedule-row row mb-3 d-none">
                                <div class="col-md-4">
                                    <label for="day" class="form-label">Gün</label>
                                    <select class="form-control" name="schedules[__INDEX__][day]">
                                        <option value="none">Heç bir gün</option>
                                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                            <option value="{{ $day }}">{{ $day }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="start_time" class="form-label">Başlama Saatı</label>
                                    <input type="time" class="form-control" name="schedules[__INDEX__][start_time]"
                                           disabled>
                                </div>
                                <div class="col-md-3">
                                    <label for="end_time" class="form-label">Bitmə Saatı</label>
                                    <input type="time" class="form-control" name="schedules[__INDEX__][end_time]"
                                           disabled>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-schedule">Sil</button>
                                </div>
                            </div>

                        </div>


                        <div class="row mb-3">
                            <div class="col-md-12 text-end">
                                <button type="button" class="btn btn-success" id="add-schedule">Cədvəl əlavə et</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        let scheduleIndex = {{ $schedules->count() }}; // start with the existing count

        // Template for new schedules
        const newScheduleTemplate = document.querySelector('#new-schedule-template').outerHTML;

        // Add new schedule row
        document.querySelector('#add-schedule').addEventListener('click', function () {
            const container = document.createElement('div');
            container.innerHTML = newScheduleTemplate.replace(/__INDEX__/g, scheduleIndex++);
            container.querySelector('#new-schedule-template').classList.remove('d-none');
            container.querySelector('#new-schedule-template').id = ''; // Remove the ID

            document.querySelector('.schedule-row').parentElement.appendChild(container);
        });

        // Update time inputs based on day selection
        document.addEventListener('change', function (e) {
            if (e.target.matches('select[name^="schedules"]')) {
                const daySelect = e.target;
                const parentRow = daySelect.closest('.row');
                const startTimeInput = parentRow.querySelector('input[name$="[start_time]"]');
                const endTimeInput = parentRow.querySelector('input[name$="[end_time]"]');

                if (daySelect.value === 'none') {
                    startTimeInput.value = '';
                    endTimeInput.value = '';
                    startTimeInput.disabled = true;
                    endTimeInput.disabled = true;
                } else {
                    startTimeInput.disabled = false;
                    endTimeInput.disabled = false;
                }
            }
        });

        // Remove schedule row
        document.addEventListener('click', function (e) {
            if (e.target.matches('.remove-schedule')) {
                e.target.closest('.row').remove();
            }
        });
    });
</script>

