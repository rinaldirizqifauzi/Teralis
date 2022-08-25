@extends('layouts.backend')

@section('title')
    Laporan Karyawan
@endsection

@section('title-page')
    Laporan Anggota Lokasi
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
    {{-- {{ Breadcrumbs::render('buku') }} --}}
@endsection

@section('content')
<div class="card my-1">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
               <!-- Start kode untuk form pencarian -->
               <form action="{{ route('motif.index') }}" method="GET">
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
         </div>
    </div>
    <div class="card-body">
        <div class="col-lg-12 mt-2">
            <table id="myTable" class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                  <th>ID Pemesanan</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal</th>
                  <th>Nama Motif</th>
                  <th>Nama Besi</th>
                  <th>Ukuran Besi</th>
                  <th>Range Besi</th>
                  <th>Panjang Besi</th>
                  <th>Lebar Besi</th>
                  <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($laporankaryawans as $index => $laporankaryawan)
                    <tr>
                        <td> {{ $laporankaryawan->pemesanans->id_pemesanan }}</td>
                        <td> {{ $laporankaryawan->anggotas->nama_anggota }}</td>
                        <td> {{ $laporankaryawan->tgl_lokasi }}</td>
                        <td> {{ $laporankaryawan->pemesanans->nama_motif }}</td>
                        <td> {{ $laporankaryawan->pemesanans->id_besis->nama_besi }}</td>
                        <td> {{ $laporankaryawan->pemesanans->id_besis->ukuranbesi->nama_ukuran }}</td>
                        <td> {{ $laporankaryawan->pemesanans->id_besis->ukuranbesi->range }}</td>
                        <td> {{ $laporankaryawan->panjang }} Cm</td>
                        <td> {{ $laporankaryawan->lebar }} Cm</td>
                        <td>
                            <div class="float-right">
                                @can('Ubah Data Laporan Karyawan')
                                <!-- edit -->
                                <a href="{{ route('laporan-karyawan.edit', ['laporan_karyawan' => $laporankaryawan]) }}" class="btn btn-sm btn-info" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('Hapus Data Laporan Karyawan')
                                <!-- delete -->
                                <form action="{{  route('laporan-karyawan.destroy', ['laporan_karyawan' => $laporankaryawan])  }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </div>
                       </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
