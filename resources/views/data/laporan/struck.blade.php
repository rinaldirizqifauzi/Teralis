@extends('layouts.backend')

@section('title')
    Struk Pemesanan
@endsection

@section('title-page')
    Struk Pemesanan
@endsection

@section('sub-menu')
    @can('laporan_show')
    <a href="{{ route('laporan.index') }}" class="nav-link {{ set_active(['laporan.index','laporan.edit','laporan.create', 'laporan.struck']) }}">
        Laporan Pemesan
    </a>
    @endcan
    @can('laporankaryawans_show')
    <a href="{{ route('laporan-karyawan.index') }}" class="nav-link {{ set_active(['laporan-karyawan.index','laporan-karyawan.create','laporan-karyawan.edit']) }}">
        Laporan Anggota
    </a>
    @endcan
@endsection

@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <h4><center> <strong>{{ $pemesanans->id_pemesanan }}</strong>  </center></h4>
                   <br>
                   <div class="row">
                       <div class="col-lg-4">
                            <p> Nama Pemesan :  {{ $pemesanans->nama }} </p>
                            <p> Nama Motif Pemesanan :  {{ $pemesanans->nama_motif }} </p>
                            <p> Harga Motif:  Rp.{{ $pemesanans->harga_motif }} </p>
                       </div>
                       <div class="col-lg-4">
                            <p>Kabupaten / Kota : {{  $pemesanans->id_kabupaten->name }}</p>
                            <p>Kecamatan : {{  $pemesanans->id_kecamatan->name }}</p>
                            <p>Desa : {{  $pemesanans->id_desa->name }}</p>
                       </div>
                       <div class="col-lg-4">
                            <p>Jenis Besi Pemesanan : {{ $pemesanans->id_besis->nama_besi }}</p>
                            <p>Harga Besi Pemesanan : Rp.{{ $pemesanans->id_besis->jenisbesi->harga }}</p>
                            <p>Jumlah Pemesanan Besi : {{ $pemesanans->jumlah }}</p>
                            <p>Total : Rp.{{ $pemesanans->harga }}</p>
                       </div>
                   </div>
                </div>
            </div>
            <div class="float-right">
               <a href="{{ route('laporan.index') }}" class="btn  btn-primary">Kembali</a>
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
