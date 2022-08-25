@extends('layouts.backend')

@section('title')
    Motif
@endsection

@section('title-page')
   Edit | Data Motif
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_nama_motif', $motif) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card card-warning">
        <div class="card-header">
            <p>Form Edit Data Motif</p>
         </div>
          <div class="card-body">
            @include('components.form-control.motif.form-edit-motif')
          </div>
       </div>
    </div>
 </div>

@endsection

@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
   <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
   <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
      function previewImage(){
        const image = document.querySelector('#image_motif');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>
@endpush



