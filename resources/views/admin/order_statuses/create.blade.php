@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('order_statuses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Əlavə et</h4>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="col-form-label">Adı* </label>
                                    <input class="form-control" type="text" name="title" value="{{old('title')}}">
                                    @if($errors->first('title')) <small class="form-text text-danger">{{ $errors->first('title') }}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Dəyəri* </label>
                                    <input class="form-control" type="text" name="value" value="{{old('value')}}">
                                    @if($errors->first('value')) <small class="form-text text-danger">{{ $errors->first('value') }}</small> @endif
                                </div>

                                <div class="mb-3">
                                    <label class="col-form-label">Rəngi (button rəngi)</label>
                                    <input class="form-control" type="color" name="color" value="{{old('color')}}">
                                    @if($errors->first('color')) <small class="form-text text-danger">{{ $errors->first('color') }}</small> @endif
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

