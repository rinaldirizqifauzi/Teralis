@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('title-page')
    Laporan Pemesanan / Tanggal
@endsection

@section('breadcrumbs')
    {{-- {{ Breadcrumbs::render('anggota') }} --}}
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #ffc107">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('report.pemesanan') }}" method="GET">
                    <div class="input-group ">
                        <input type="date"  value="{{ request()->get('start_date') }}" class="form-control mx-2" name="start_date">
                        <input type="date"  value="{{ request()->get('end_date') }}"  class="form-control mx-2" name="end_date">
                        <button class="btn btn-warning btn-md mx-3" type="submit">Cari</button>
                        <a href="{{ route('report.pemesanan') }}" class="btn btn-secondary">Refresh</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
        <table class="table table-striped">
            <thead class="table-warning">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Pemesanan</th>
                    <th scope="col">Nama Pemesanan</th>
                    <th scope="col">Nama Motif</th>
                    <th scope="col">Harga Motif</th>
                    <th scope="col">Harga Besi/Batang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as  $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->id_pemesanan }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->nama_motif }}</td>
                    <td>{{ $data->harga_motif }}</td>
                    <td>{{ $data->id_besis->jenisbesi->harga}}</td>
                    <td>{{ $data->jumlah}}</td>
                    <td>{{ $data->harga}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
       </div>
        <div class="float-right">
            <a href="{{ route('dashboard.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body my-4">
        <div class="row">
            <div class="col-lg-6">
               <center>
                <h4>Total Pemesanan</h4>
                <h1> {{ $jumpemesanans }} Transaksi</h1>
               </center>
            </div>
            <div class="col-lg-6">
                <center>
                    <h4>Total Pendapatan Pemesanan</h4>
                    <h1> Rp. {{ $sumpemesanans }}</h1>
                </center>
            </div>
        </div>
    </div>
</div>

@endsection
