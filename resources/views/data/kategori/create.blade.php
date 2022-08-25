@extends('layouts.backend')

@section('title')
    Kategori
@endsection

@section('title-page')
   Tambah | Data Kategori
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('tambah_category') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card card-primary">
            <div class="card-header">
                <p>Form Tambah Kategori</p>
            </div>
          <div class="card-body">
            @include('components.form-control.kategori.form-create-kategori')
          </div>
       </div>
    </div>
 </div>
@endsection




