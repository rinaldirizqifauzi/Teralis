@extends('layouts.backend')

@section('title')
    Karyawan
@endsection

@section('title-page')
   Edit | Data Anggota
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_nama_karyawan', $karyawan) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card card-warning">
            <div class="card-header">
                <p>Form Edit Data Anggota</p>
            </div>
          <div class="card-body">
            @include('components.form-control.anggota.form-edit-anggota')
          </div>
       </div>
    </div>
 </div>
@endsection

@push('javascript-internal')
    <script>
      function previewImage(){
        const image = document.querySelector('#image_ktp');
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


