@extends('layouts.backend')

@section('title')
    Laporan Karyawan
@endsection

@section('title-page')
    Data Laporan Anggota Pemesanan
@endsection

@section('sub-menu')
    @can('Tampil Data Laporan Pemesanan')
    <a href="{{ route('laporan.index') }}" class="nav-link {{ set_active(['laporan.index','laporan.edit','laporan.create', 'laporan.struck']) }}">
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
    {{ Breadcrumbs::render('laporan_anggota') }}
@endsection


@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    @can('Buat Data Laporan Karyawan')
                    <div class="float-right">
                        <a href="{{ route('laporan-karyawan.create') }}" class="btn btn-primary">Tambah Data</a>
                    </div>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <table id="myTable" class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                          <th>ID Pemesanan</th>
                          <th>Nama Anggota</th>
                          <th>Tanggal</th>
                          <th>Nama Motif</th>
                          <th>Harga Motif</th>
                          <th>Nama Besi</th>
                          <th>Harga Besi</th>
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
                                <td> {{ $laporankaryawan->pemesanans->harga_motif }}</td>
                                <td> {{ $laporankaryawan->pemesanans->id_besis->nama_besi }}</td>
                                <td> {{ $laporankaryawan->pemesanans->id_besis->jenisbesi->harga }}</td>
                                <td>
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
                               </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-right">
                {{-- {!! $pemesanans->links() !!} --}}
            </div>
          </div>
       </div>
    </div>
</div>
@endsection

@push('javascript-internal')
    <script>
       $(document).ready(function(){
         //event :delete
         $("form[role='alert']").submit(function(event){
            event.preventDefault();
               Swal.fire({
                  title: $(this).attr('alert-title'),
                  text:  $(this).attr('alert-text'),
                  icon: 'warning',
                  allowOutsideClick: false,
                  showCancelButton: true,
                  cancelButtonText: "Tidak",
                  reverseButtons: true,
                  confirmButtonText: "Iya",
               }).then((result) => {
                  if (result.isConfirmed) {
                     event.target.submit();
                  }
               });
         })
       })


    </script>
@endpush
