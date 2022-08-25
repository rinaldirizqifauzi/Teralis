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
          <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table id="myTable" class="table table-stripped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Pemesanan</th>
                                <th>Nama Motif</th>
                                <th>Nama Pemesan</th>
                                <th>Kode Pemesanan</th>
                                <th>Harga Motif</th>
                                <th>Nama Besi</th>
                                <th>Harga Besi / Batang</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesanans as $index => $pemesanan)
                            <tr>
                                <td> {{ $pemesanan->id_pemesanan }}</td>
                                <td> {{ $pemesanan->nama_motif }}</td>
                                <td> {{ $pemesanan->nama }}</td>
                                <td> {{ $pemesanan->kode_pemesanan }}</td>
                                <td> {{ $pemesanan->harga_motif }}</td>
                                <td> {{ $pemesanan->id_besis->nama_besi }}</td>
                                <td> {{ $pemesanan->id_besis->jenisbesi->harga }}</td>
                                <td> {{ $pemesanan->jumlah }}</td>
                                <td> {{ $pemesanan->harga }}</td>
                                <td>
                                    @can('Struk Data Laporan Pemesanan')
                                    {{-- Struck --}}
                                    <a href="{{ route('laporan.struck', [$pemesanan->id]) }}" class="btn btn-sm btn-info" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                                    <a href="{{ route('laporan.edit', [$pemesanan->id]) }}" class="btn btn-sm btn-warning" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-right">
                {!! $pemesanans->links() !!}
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
