@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-info">
                <h5>{{ env('APP_NAME') }}</h5>
                <p>Selamat Datang, {{ Auth::user()->nama }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $kebakaran_count }}</h3>
                    <p>Data Kebakaran</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('kebakaran.index') }}" class="small-box-footer">Lihat <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $penyelamatan_count }}</h3>
                    <p>Data Penyelamatan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('penyelamatan.index') }}" class="small-box-footer">Lihat <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $laporan_count }}</h3>
                    <p>Data Laporan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ route('laporan.kebakaran') }}" class="small-box-footer">Lihat <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Jumlah Kejadian Tahun 2023</h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="barChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 606px;"
                            width="1212" height="500" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        const bulan = @json($bulan);
        const kebakaranChart = @json($kebakaran_chart);
        const penyelamatanChart = @json($penyelamatan_chart);

        const areaChartData = {
            labels: bulan,
            datasets: [{
                label: 'Kebakaran',
                backgroundColor: 'rgba(220,53,69,0.8)',
                borderColor: 'rgba(220,53,69,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(220,53,69,0.8)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,53,69,0.8)',
                data: kebakaranChart
            }, {
                label: 'Penyelamatan',
                backgroundColor: 'rgba(23, 162, 184, .8)',
                borderColor: 'rgba(23, 162, 184, .8)',
                pointRadius: false,
                pointColor: 'rgba(23, 162, 184, .8)',
                pointStrokeColor: '#c1c7d1',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data: penyelamatanChart
            }, ]
        };

        new Chart($('#barChart').get(0).getContext('2d'), {
            type: 'bar',
            data: $.extend(true, {}, areaChartData),
            options: {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                ticks: {
                    precision: 0
                }
            }
        });
    </script>
@endpush
