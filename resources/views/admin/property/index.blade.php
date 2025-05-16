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
                                <h4 class="card-title mb-0">DƏİS</h4>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered mt-4">
                                    <thead>
                                    <tr>
                                        <th>Contract №</th>
                                        <th>Customer</th>
                                        <th>Full Name</th>
                                        <th>Registry №</th>
                                        <th>Address</th>
                                        <th>Amount</th>
                                        <th>Creation Date</th>
                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($insurances as $insurance)
                                        <tr>
                                            <td>{{ $insurance->contractNumber }}</td>
                                            <td>{{ $insurance->customer->name ?? '-' }}</td>
                                            <td>{{ $insurance->insuredPerson->fullName ?? '-' }}</td>
                                            <td>{{ $insurance->property->registryNumber ?? '-' }}</td>
                                            <td>{{ optional(json_decode($insurance->property->propertyAddress))->address ?? '-' }}</td>
                                            <td>{{ $insurance->sumInsured }} ₼</td>
                                            <td>{{ \Carbon\Carbon::parse($insurance->creationDate)->format('d.m.Y') }}</td>
                                            <td><a href="{{ route('property.insurances.show', $insurance->id) }}" class="btn btn-primary btn-sm">Bax</a></td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="8">Heç bir məlumat tapılmadı.</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>

                            </div>

                            {{-- Pagination --}}
                            <div class="mt-4">
{{--                                {{ $customers->withQueryString()->links('pagination::bootstrap-5') }}--}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.includes.footer')
