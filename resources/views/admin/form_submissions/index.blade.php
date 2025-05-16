@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Mesajlar ({{$category->title}})</h4>
                    <br>
                    <form action="{{route('form_submissions.index')}}" method="get">
                        <div class="row d-flex align-items-end">
                            <input type="hidden" name="category_id" value="{{$category->id}}">

                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="col-form-label" for="order_status">Limit</label>
                                    <select class="form-control" name="limit">
                                        <option selected value="">---</option>
                                        <option value="10" {{ request()->limit == '10' ? 'selected' : '' }}>10</option>
                                        <option value="50" {{ request()->limit == '50' ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request()->limit == '100' ? 'selected' : '' }}>100</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label" for="order_status">Xidmət</label>
                                    <select class="form-control" name="service_id">
                                        <option selected value="">---</option>
                                        @foreach($category->services as $service)
                                            <option value="{{$service->id}}" {{ request()->service_id == $service->id ? 'selected' : '' }}>{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="col-form-label" for="status">Status</label>
                                    <select class="form-control" name="status">
                                        <option selected value="">---</option>
                                        @foreach($order_statuses as $order_status)
                                            <option value="{{$order_status->value}}" {{request()->status == $order_status->value ? 'selected' : ''}}>{{$order_status->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Sözə görə axtarış</label>
                                    <input type="text" name="name" value="{{request()->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Başlanğıc tarix</label>
                                    <input type="date" name="start_date" value="{{request()->start_date}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label">Son tarix</label>
                                    <input type="date" name="end_date" value="{{request()->end_date}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="col-form-label">Axtar</label>
                                    <input type="submit" class="form-control btn btn-primary" value="Axtar">
                                </div>
                            </div>

                            <div class="col-md-1">
                                <div class="mb-3">
                                    <label class="col-form-label">Sıfırla</label><br>
                                    <a href="{{route('form_submissions.index',['category_id' => $category->id])}}" class="btn btn-secondary">Sıfırla</a>
                                </div>
                            </div>
                        </div>

                    </form>
                    <form action="{{route('exportSubmissionsToExcel')}}" method="post">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        <input type="hidden" name="limit" value="{{ request()->limit }}">
                        <input type="hidden" name="status" value="{{ request()->status }}">
                        <input type="hidden" name="name" value="{{ request()->name }}">
                        <input type="hidden" name="start_date" value="{{ request()->start_date }}">
                        <input type="hidden" name="end_date" value="{{ request()->end_date }}">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label" for="order_status">Xidmətə görə</label>
                                    <select class="form-control" name="service_id">
                                        <option value="">---</option> <!-- Optional: Default option -->
                                        @foreach($category->services as $service)
                                            <option value="{{$service->id}}" {{ request()->service_id == $service->id ? 'selected' : '' }}>{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <br>
                                    <br>
                                    <div class="mb-3">
                                        <button type="submit" class="form-control btn btn-primary">Export</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <br>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Xidmət adı</th>
                                <th>Fin kod</th>
                                <th>Tarix</th>
                                <th>Status</th>
{{--                                <th>Data</th>--}}
                                <th>Qeyd</th>
                                <th>Loglar</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($formSubmissions as $key => $submission)
                                <tr>
                                    <td>{{ $formSubmissions->firstItem() + $key }}</td>

                                    <td>{{ $submission->form?->service?->title }}</td>
                                    @php
                                        $dateDetails = json_decode($submission->data);
                                    @endphp

                                    <td>
                                        {{ $dateDetails && property_exists($dateDetails, 'fin_code') ? $dateDetails->fin_code : 'N/A' }}
                                    </td>

                                    <td>{{ $submission->created_at->format('d.m.Y H:i') }}</td>

                                    <td>
                                        <button class="btn " style="background-color: {{$submission->status_color}}">{{$submission->status_title}}</button>
                                    </td>

                                    <td style="width: 150px; text-wrap: wrap">{{Str::limit($submission->note, 20)}}</td>
                                    <td>
                                        <div class="order-logs">
                                            @foreach($submission->order_logs as $key => $order_log)
                                                <div class="order-log-item mb-3 p-2 border rounded">
{{--                                                    <strong>№:</strong> {{$key + 1}} <br>--}}
                                                    <strong>Tarix:</strong> {{$order_log->created_at->format('d.m.Y H:i')}} <br>
                                                    <strong>User:</strong> {{$order_log->user?->name}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary" href="{{ route('form_submissions.show', ['form_submission' => $submission->id] + request()->query()) }}">
                                            Bax
                                        </a>
                                    @can('delete-form_submissions')
                                            <form action="{{route('form_submissions.destroy', ['form_submission' => $submission->id] + request()->query())}}"
                                                  method="post" style="display: inline-block">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                        class="btn btn-danger">Sil
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <br>
                        {{ $formSubmissions->links('admin.vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')
