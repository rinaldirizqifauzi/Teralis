@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('title-page')
    Laporan Karyawan / Tanggal
@endsection

@section('breadcrumbs')
    {{-- {{ Breadcrumbs::render('anggota') }} --}}
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #17A2B8">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('report.karyawan') }}" method="GET">
                    <div class="input-group ">
                        <input type="date"  value="{{ request()->get('start_date') }}" class="form-control mx-2" name="start_date">
                        <input type="date"  value="{{ request()->get('end_date') }}"  class="form-control mx-2" name="end_date">
                        <button class="btn btn-info btn-md mx-3" type="submit">Cari</button>
                        <a href="{{ route('report.karyawan') }}" class="btn btn-secondary">Refresh</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
        <table class="table table-striped">
            <thead class="table-info">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id Pemesanan</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Tgl Ke Lokasi</th>
                    <th scope="col">Kabupaten/Kota</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Desa</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as  $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->pemesanans->id_pemesanan }}</td>
                    <td>{{ $data->pemesanans->nama}}</td>
                    <td>{{ $data->anggotas->nama_anggota}}</td>
                    <td>{{ $data->tgl_lokasi}}</td>
                    <td>{{ $data->pemesanans->id_provinsi->name ?? '-' }}</td>
                    <td>{{ $data->pemesanans->id_kecamatan->name ?? '-' }}</td>
                    <td>{{ $data->pemesanans->id_desa->name ?? '-' }}</td>
                    <td><button class="btn {{ ($data->pemesanans->status == 1 ) ? 'btn-warning' : 'btn-success'}}">{{ ($data->pemesanans->status == 1) ? 'Proses' : 'Sukses' }}</button></td>
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

@endsection
