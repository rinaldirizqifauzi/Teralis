@extends('layouts.backend')

@section('title')
    Karyawan
@endsection

@section('title-page')
    Data Anggota
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('anggota') }}
@endsection


@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card card-dark">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <!-- Start kode untuk form pencarian -->
                   <form action="{{ route('karyawan.index') }}" method="GET">
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
                    @can('Buat Data Karyawan')
                    <a href="{{ route('karyawan.create') }}" class="btn btn-primary float-right" role="button">
                          Tambah Data
                          <i class="fas fa-plus-square"></i>
                       </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
              <div class="row">
                    @include('components.table.anggota')
              </div>
           </div>
       </div>
        {{-- <div class="float-right">
            {!! $besis->links() !!}
        </div> --}}
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
