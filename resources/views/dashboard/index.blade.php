@extends('layouts.backend')

@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('title')
    Home
@endsection

@section('title-page')
    Home
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $lap_posting }} </h3>
                <h5>Laporan Posting</h5>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('report.posting') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $lap_karyawan }} </h3>
                <h5>Data Anggota</h5>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('report.anggota') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $lap_karyawan }} </h3>
                <h5>Laporan Anggota Ke Lokasi</h5>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('report.karyawan') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning ">
            <div class="inner">
                <div class="row ">
                    <div class="col-lg-2">
                        <h3 class="">{{ $lap_pemesanan }}</h3>
                    </div>
                    <div class="col-lg-7">
                        <h3>Rp. {{ $sumpemesanans }} </h3>
                    </div>
                </div>
                <h5>Laporan Pemesanan </h5>
            </div>
            <div class="icon">
            <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('report.pemesanan') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <div id="chartPertahun"></div>
        </div>
    </div>
</div>

@endsection

@section('chart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartPertahun', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Laporan Pendapatan Per Bulan'
    },
    xAxis: {
        categories: {!! json_encode($bulan) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Pendapatan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Pendapatan',
        data: {!! json_encode($pendapatan_per_bulan) !!}

    }]
});
</script>
@endsection
