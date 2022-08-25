@extends('layouts.backend')

@section('title')
    Kategori
@endsection

@section('title-page')
   Edit | Data Kategori
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_nama_category', $kategori) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card card-warning">
        <div class="card-header">
            <p>Form Edit Kategori</p>
        </div>
          <div class="card-body">
            @include('components.form-control.kategori.form-edit-kategori')
          </div>
       </div>
    </div>
 </div>
@endsection




