@extends('layouts.backend')

@section('title')
    Laporan Pemesanan
@endsection

@section('title-page')
    Data Laporan
@endsection

@section('sub-menu')
    @can('Tampil Data Laporan Pemesanan')
    <a href="{{ route('laporan.index') }}" class="nav-link {{ set_active(['laporan.index','laporan.edit','laporan.create']) }}">
        Laporan Pemesan
    </a>
    @endcan
    @can('Tampil Data Laporan Karyawan')
    <a href="{{ route('laporan-karyawan.index') }}" class="nav-link {{ set_active(['laporan-karyawan.index','laporan-karyawan.create','laporan-karyawan.edit']) }}">
        Laporan Anggota
    </a>
    @endcan
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('pemesanan') }}
@endsection


@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <!-- Start kode untuk form pencarian -->
                   <form action="{{ route('kategori.index') }}" method="GET">
                    <div class="input-group">
                       <input name="search" type="search" class="form-control" placeholder="Masukkan keyword" value="{{ request()->get('search') }}">
                       <div class="input-group-append">
                          <button class="btn btn-primary" type="submit">
                             <i class="fas fa-search"></i>
                          </button>
                       </div>
                    </div>
                 </form>
                </div>
                <div class="col-md-6">

                </div>
             </div>
          </div>
          <div class="card-body">
            <form action="{{ route('pemesanan.update', ['id' => $pemesanans->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="kode_pemesanan">
                                Kode Pemesanan
                            </label>
                            <input type="text" name="kode_pemesanan" class="form-control" value="{{ $pemesanans->kode_pemesanan }}" id="kode_pemesanan">
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status">
                                Status
                            </label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih Status</option>
                                <option value="0">Sukses</option>
                                <option value="1">Proses</option>
                            </select>
                        </div>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary px-4" href="{{ route('laporan.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary px-4">Edit</button>
                    </div>
                </div>
            </form>
          </div>
       </div>
    </div>
</div>
@endsection

