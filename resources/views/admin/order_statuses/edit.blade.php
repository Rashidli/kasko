@include('admin.includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <form action="{{ route('order_statuses.update', $order_status->id) }}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
                            <ol class="breadcrumb bg-light p-3 rounded">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('order_statuses.index') }}">Geri</a></li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Adı* </label>
                                    <input class="form-control" type="text" name="title" value="{{$order_status->title}}">
                                    @if($errors->first("title")) <small class="form-text text-danger">{{ $errors->first("title") }}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Dəyəri* </label>
                                    <input class="form-control" type="text" name="value" value="{{$order_status->value}}">
                                    @if($errors->first("value")) <small class="form-text text-danger">{{ $errors->first("value") }}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <label class="col-form-label">Rəngi </label>
                                    <input class="form-control" type="color" name="title" value="{{$order_status->color}}">
                                    @if($errors->first("title")) <small class="form-text text-danger">{{ $errors->first("title") }}</small> @endif
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

<!-- Include Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
