@include('admin.includes.header')
<style>
    #chart {
        max-width: 650px;
        margin: 35px auto;
    }
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin panel</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                @foreach($main_categories ?? [] as $category)
                    @php
                        $totalFormSubmissions = 0;
                        $todaysFormSubmissions = 0;

                        foreach ($category->services as $service) {
                            if ($service->form) {
                                $totalFormSubmissions += $service->form->form_submissions?->count();

                                $todaysFormSubmissions += $service->form->form_submissions?->filter(function($submission) {
                                    return $submission->created_at->isToday();
                                })->count();
                            }
                        }
                    @endphp
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card shadow-sm border-light">
                            <div class="card-body">
                                <h5 class="card-title mb-2">{{ $category->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <p class="mb-1 text-muted">Ümumi müraciətlər:</p>
                                        <h4 class="mb-0">{{ $totalFormSubmissions }}</h4>
                                    </div>
                                    <div class="text-center">
                                        <span class="btn btn-primary rounded-pill">Bu gün: {{ $todaysFormSubmissions }} </span>
                                    </div>
                                </div>
                                <a href="{{ route('form_submissions.index', ['category_id' => $category->id]) }}" class="btn btn-outline-primary btn-sm">
                                    Müraciətlərə bax
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div id="chart">

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>
                    © Corporate
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted by 166Tech
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

@include('admin.includes.footer')
<script>
    // Fetch the registration data from the API
    fetch('/customer-registrations-per-day')
        .then(response => response.json())
        .then(data => {
            const dates = data.map(item => item.date);
            const counts = data.map(item => item.count);

            var options = {
                chart: {
                    type: 'bar'
                },
                series: [{
                    name: 'User sayı',
                    data: counts
                }],
                xaxis: {
                    categories: dates
                }
            }

            var chart = new ApexCharts(document.querySelector("#chart"), options);

            chart.render();
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
