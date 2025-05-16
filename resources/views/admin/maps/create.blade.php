@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('maps.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Əlavə et</h4>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Xəritə </label>
                                    <textarea class="form-control" name="map"></textarea>
                                    @if($errors->first('map')) <small class="form-text text-danger">{{ $errors->first('map') }}</small> @endif
                                </div>
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

