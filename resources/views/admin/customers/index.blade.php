@include('admin.includes.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm rounded-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="card-title mb-0">Userlər</h4>
                            </div>

                            <form method="GET" action="{{ route('customers.index') }}" class="row g-3 mb-4">
                                <div class="col-md-3">
                                    <input type="text" name="name" value="{{ request('name') }}" class="form-control" placeholder="Ad axtar...">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="email" value="{{ request('email') }}" class="form-control" placeholder="Email axtar...">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="phone" value="{{ request('phone') }}" class="form-control" placeholder="Mobil nömrə axtar...">
                                </div>
                                <div class="col-md-3 d-flex align-items-center">
                                    <button type="submit" class="btn btn-primary me-2">Axtar</button>
                                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Təmizlə</a>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle text-center">
                                    <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Ad</th>
                                        <th>Email</th>
                                        <th>Fin kod</th>
                                        <th>Mobil nömrə</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($customers as $key => $customer)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->fin_code }}</td>
                                            <td>{{ $customer->phone }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Heç bir istifadəçi tapılmadı.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Pagination --}}
                            <div class="mt-4">
                                {{ $customers->withQueryString()->links('pagination::bootstrap-5') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.includes.footer')
