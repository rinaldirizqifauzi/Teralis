@extends('layouts.backend')

@section('title')
    Besi
@endsection

@section('sub-menu')
    <a href="{{ route('jenisbesi.index') }}" class="nav-link {{ set_active(['jenisbesi.index','jenisbesi.create','jenisbesi.edit']) }}">
        Jenis Besi
    </a>
    <a href="{{ route('ukuranbesi.index') }}" class="nav-link {{ set_active(['ukuranbesi.index','ukuranbesi.create','ukuranbesi.edit']) }}">
        Ukuran Besi
    </a>
@endsection

@section('title-page')
   Edit | Data Besi
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_nama_besi', $besi) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card card-warning">
            <div class="card-header">
                Form Edit Data Besi
            </div>
          <div class="card-body">
                @include('components.form-control.besi.form-edit-besi')
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
   <script src="{{ asset('/vendor/select2/js/select2.min.js') }}"></script>
   <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('javascript-internal')
<script>
     $(function(){
         $('#select_jenis_besi').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('jenisbesi.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.jenis_besi,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
         $('#select_ukuran_besi').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('ukuranbesi.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama_ukuran,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
       });
        const image = document.querySelector('#image_besi');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
</script>
@endpush


