@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Submission Details</h4>

                    <div class="mb-3">
                        <a href="{{ route('form_submissions.index',['category_id'=>$formSubmission->form?->service?->category?->id]) }}" class="btn btn-secondary">Back to List</a>
                    </div>

                    <div class="row">
                        @foreach(json_decode($formSubmission->data, true) as $key => $value)
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                    <p>{{ is_array($value) ? implode(', ', $value) : $value }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add a form to update the status and note -->
                    <form action="{{ route('form_submissions.update', $formSubmission->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label" for="status">Status</label>
                                    <select class="form-control"  name="status">
                                        <option value="1" {{$formSubmission->status == 1 ? 'selected' : ''}}>Yeni</option>
                                        <option value="2" {{$formSubmission->status == 2 ? 'selected' : ''}}>Əlaqə saxlanıldı</option>
                                        <option value="3" {{$formSubmission->status == 3 ? 'selected' : ''}}>Müqavilə bağlanıldı</option>
                                        <option value="4" {{$formSubmission->status == 4 ? 'selected' : ''}}>İmtina edildi</option>
                                        <option value="5" {{$formSubmission->status == 5 ? 'selected' : ''}}>Əlaqə alınmadı</option>
                                        <option value="6" {{$formSubmission->status == 6 ? 'selected' : ''}}>Təklif verildi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label" for="note">Note</label>
                                    <textarea class="form-control" id="note" name="note">{{ $formSubmission->note }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')
