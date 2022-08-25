@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('title-page')
    Data Ukuran Besi
@endsection

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

@section('breadcrumbs')
    {{ Breadcrumbs::render('ukuranbesi') }}
@endsection


@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card card-dark">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    @can('Buat Data Ukuran Besi')
                    <a href="{{ route('ukuranbesi.create') }}" class="btn btn-primary float-right" role="button">
                       Tambah Data
                       <i class="fas fa-plus-square"></i>
                    </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    @include('components.table.ukuranbesi')
                </div>
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
