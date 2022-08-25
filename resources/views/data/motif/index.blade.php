@extends('layouts.backend')

@section('title')
    Motif
@endsection

@section('title-page')
    <p class="title-page">Data Motif</p>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('motif') }}
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
                   <form action="{{ route('motif.index') }}" method="GET">
                    <div class="input-group">
                       <input name="search" type="search" class="form-control" placeholder="Masukkan keyword" value="{{ request()->get('search') }}">
                       <div class="btn-cari input-group-append">
                          <button class="btn btn-primary" type="submit">
                             <i class="fas fa-search"></i>
                          </button>
                       </div>
                    </div>
                 </form>
                </div>
                <div class="col-md-6">
                    @can('Buat Data Motif')
                    <a href="{{ route('motif.create') }}" class="button-tambah btn btn-primary float-right" role="button">
                       Tambah Data
                       <i class="fas fa-plus-square"></i>
                    </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
                @include('components.table.motif')
          </div>
       </div>
        {!! $motifs->links() !!}
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
                  cancelButtonText: $(this).attr('alert-btn-cancel'),
                  confirmButtonText: $(this).attr('alert-btn-yes'),
               }).then((result) => {
                  if (result.isConfirmed) {
                     event.target.submit();
                  }
               });
         })
       })
    </script>
@endpush
