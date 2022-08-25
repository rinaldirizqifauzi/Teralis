@extends('layouts.backend')

@section('sub-menu')
    @can('Tampil Data Jenis Besi')
    <a href="{{ route('jenisbesi.index') }}" class="nav-link {{ set_active(['jenisbesi.index','jenisbesi.create','jenisbesi.edit']) }}">
        Jenis Besi
    </a>
    @endcan
    @can('Tampil Data Ukuran Besi')
    <a href="{{ route('ukuranbesi.index') }}" class="nav-link {{ set_active(['ukuranbesi.index','ukuranbesi.create','ukuranbesi.edit']) }}">
        Ukuran Besi
    </a>
    @endcan
@endsection

@section('title')
    Besi
@endsection

@section('title-page')
    Data Besi
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('besi') }}
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
                   <form action="{{ route('besi.index') }}" method="GET">
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
                    @can('Buat Data Besi')
                    <a href="{{ route('besi.create') }}" class="btn btn-primary float-right" role="button">
                       Tambah Data
                       <i class="fas fa-plus-square"></i>
                    </a>
                    @endcan
                </div>
             </div>
          </div>
            <div class="card-body">
                <div class="row">
                    @include('components.table.besi')
                </div>
            </div>
            <div class="float-right">
                {!! $besis->links() !!}
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
