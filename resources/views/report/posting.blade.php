@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('title-page')
    Laporan Posting / Tanggal
@endsection

@section('breadcrumbs')
    {{-- {{ Breadcrumbs::render('anggota') }} --}}
@endsection

@section('content')
<div class="card">
    <div class="card-header" style="background-color: #28A745">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="{{ route('report.posting') }}" method="GET">
                    <div class="input-group ">
                        <input type="date"  value="{{ request()->get('start_date') }}" class="form-control mx-2" name="start_date">
                        <input type="date"  value="{{ request()->get('end_date') }}"  class="form-control mx-2" name="end_date">
                        <button class="btn btn-success btn-md mx-3" type="submit">Cari</button>
                        <a href="{{ route('report.posting') }}" class="btn btn-secondary">Refresh</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
       <div class="row">
        <table class="table table-striped">
            <thead class="table-success">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Posting</th>
                    <th scope="col">Nama Motif</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Tanggal Posting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as  $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nama_posting }}</td>
                    <td>{{ $data->id_motifs->nama_motif }}</td>
                    <td>{{ $data->id_kategoris->nama_kategori }}</td>
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
<div class="card">
    <div class="card-body">
        <div class="row">
             <div class="col-lg-12">
                <center>
                 <h4>Total Postingan</h4>
                 <h1> {{ $jumposting }} Posting</h1>
                </center>
             </div>
        </div>
    </div>
</div>

@endsection
