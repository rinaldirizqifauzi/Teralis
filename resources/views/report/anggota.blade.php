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
    <div class="card-header" style="background-color: #dc3545">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('report.karyawan') }}" method="GET">
                    <div class="input-group ">
                        <input type="date"  value="{{ request()->get('start_date') }}" class="form-control mx-2" name="start_date">
                        <input type="date"  value="{{ request()->get('end_date') }}"  class="form-control mx-2" name="end_date">
                        <button class="btn btn-danger btn-md mx-3" type="submit">Cari</button>
                        <a href="{{ route('report.karyawan') }}" class="btn btn-secondary">Refresh</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
        <table class="table table-striped">
            <thead class="table-danger">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as  $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nama_anggota }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->created_at }}</td>
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
