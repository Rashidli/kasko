@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">{{ $formSubmission->form?->service?->title }}</h4>
                        </div>
                        <div class="card-body">
{{--                            <h5 class="card-title">{{ $formSubmission->form?->service?->title }}</h5>--}}
                            <p class="text-muted">Tarix: {{ $formSubmission->created_at->format('d.m.Y H:i') }}</p>

                            <div class="d-flex justify-content-start mb-3">
                                <form action="{{ route('form_submissions.destroy', ['form_submission' => $formSubmission->id] + request()->query()) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger me-2">
                                        <i class="bi bi-trash"></i> Sil
                                    </button>
                                </form>

                                <a href="{{ route('form_submissions.index', array_merge(['category_id' => $formSubmission->form?->service?->category?->id], request()->query())) }}" class="btn btn-secondary">
                                    <i class="bi bi-arrow-left"></i> Geri qayıt
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @php
                            // Decode the JSON data into an array
                            $data = json_decode($formSubmission->data, true);
                            // Extract prefix and mobile values
                            $prefix = $data['prefix'] ?? null;
                            $mobile = $data['mobile'] ?? null;
                        @endphp

                        @foreach($data as $key => $value)
                            @if($key === 'prefix' || $key === 'mobile')
                                @continue  <!-- Skip displaying prefix and mobile in the loop -->
                            @endif

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">{{ ucfirst(str_replace('_', ' ', $key)) }}</label>
                                    <p>{{ is_array($value) ? implode(', ', $value) : $value }}</p>
                                </div>
                            </div>
                        @endforeach

                        @if ($prefix && $mobile)
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label">Mobil nömrə</label><br>
                                    @php
                                        // Remove dashes from the mobile number for proper formatting
                                        $formattedMobile = str_replace('-', '', $mobile);
                                        // Combine prefix and mobile number
                                        $fullNumber =  $prefix . $formattedMobile;
                                    @endphp
                                    <a href="tel:{{ $fullNumber }}">{{ $fullNumber }}</a>
                                </div>
                            </div>
                        @endif
                        @if($formSubmission->order_logs->count() > 0)
                            <div class="col-6">
                                <label class="col-form-label">Sonuncu editləmə</label><br>
                                <div class="order-logs">
                                    @foreach($formSubmission->order_logs as $key => $order_log)
                                        <div class="order-log-item mb-3 p-2 border rounded">
                                            {{--                                                    <strong>№:</strong> {{$key + 1}} <br>--}}
                                            <strong>Tarix:</strong> {{$order_log->created_at->format('d.m.Y H:i')}} <br>
                                            <strong>User:</strong> {{$order_log->user?->name}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                    </div>

                    <!-- Add a form to update the status and note -->
                    <form style="display: inline" action="{{ route('form_submissions.update', ['form_submission' => $formSubmission->id] + request()->query()) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="col-form-label" for="status">Status</label>
                                    <select class="form-control"  name="status">
                                        @foreach($order_statuses as $order_status)
                                            <option value="{{$order_status->value}}" {{request()->status == $order_status->value ? 'selected' : ''}}>{{$order_status->title}}</option>
                                        @endforeach
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

                        <div class="mb-3" style="display: inline">
                            <button type="submit" class="btn btn-primary">Yadda saxla</button>
                        </div>
                    </form>
                    <form style="display: inline" action="{{ route('form_submissions.destroy', ['form_submission' => $formSubmission->id] + request()->query()) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger me-2">
                            <i class="bi bi-trash"></i> Sil
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')
