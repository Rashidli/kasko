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
                        <div class="row">
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class=" col-form-label" for="order_status">Limit</label>
                                    <select class="form-control" name="limit">
                                        <option selected value="">---</option>
                                        <option value="10" {{ request()->limit == '10' ? 'selected' : '' }}>10</option>
                                        <option value="50" {{ request()->limit == '50' ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ request()->limit == '100' ? 'selected' : '' }}>100
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class=" col-form-label" for="order_status">Xidmət</label>
                                    <select class="form-control" name="service_id">
                                        <option selected value="">---</option>
                                        @foreach($category->services as $service)
                                            <option
                                                value="{{$service->id}}" {{ request()->service_id == $service->id ? 'selected' : '' }}>{{$service->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label" for="status">Status</label>
                                    <select class="form-control" name="status">
                                        <option selected value="">---</option>
                                        <option value="1" {{request()->status == 1 ? 'selected' : ''}}>Yeni</option>
                                        <option value="2" {{request()->status == 2 ? 'selected' : ''}}>Əlaqə saxlanıldı</option>
                                        <option value="3" {{request()->status == 3 ? 'selected' : ''}}>Müqavilə bağlanıldı</option>
                                        <option value="4" {{request()->status == 4 ? 'selected' : ''}}>İmtina edildi</option>
                                        <option value="5" {{request()->status == 5 ? 'selected' : ''}}>Əlaqə alınmadı</option>
                                        <option value="6" {{request()->status == 6 ? 'selected' : ''}}>Təklif verildi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label"> Sözə görə axtarış </label>
                                    <input type="text" name="name" value="{{request()->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label"> Tarix </label>
                                    <input type="date" name="date" value="{{request()->date}}" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label"> Axtar </label>
                                    <input type="submit" class="form-control btn btn-primary">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="col-form-label"> Sıfırla </label><br>
                                    <a href="{{route('form_submissions.index',['category_id' => $category->id])}}"
                                       class="btn btn-primary">Sıfırla</a>
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
                                <th>Tarix</th>
                                <th>Status</th>
                                <th>Data</th>
                                <th>Qeyd</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($formSubmissions as $submission)
                                <tr>
                                    <td>{{ $submission->id }}</td>
                                    <td>{{ $submission->form?->service?->title }}</td>
                                    <td>{{ $submission->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td >
                                        <button class="btn {{\App\Enums\StatusEnum::from($submission->status)->cssClass()}}">{{\App\Enums\StatusEnum::from($submission->status)->label()}}</button>
                                    </td>
                                    <td>
                                        @php
                                            $dateDetails = json_decode($submission->data);
                                        @endphp
                                        @if($dateDetails)
                                            <ul>
                                                <li>Fin Code: {{ $dateDetails->fin_code ?? 'N/A' }}</li>
                                                <li>Telefon: {{ $dateDetails->prefix ?? 'N/A'}} {{ $dateDetails->mobile ?? 'N/A' }}</li>
                                                <li>Elektron Poçt: {{ $dateDetails->elektron_poct ?? 'N/A' }}</li>
                                                <li>Sigorta Şirkəti: {{ $dateDetails->sigorta_sirketi ?? 'N/A' }}</li>
                                            </ul>
                                        @else
                                            No data available
                                        @endif
                                    </td>
                                    <td>{{$submission->note}}</td>
                                    <td>
                                        <a href="{{ route('form_submissions.show', $submission->id) }}"
                                           class="btn btn-info">Bax</a>
                                        @can('delete-form_submissions')
                                            <form action="{{route('form_submissions.destroy', $submission->id)}}"
                                                  method="post" style="display: inline-block">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                        class="btn btn-danger">Delete
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
