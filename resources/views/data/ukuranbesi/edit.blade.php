@extends('layouts.backend')

@section('title')
    Dashboard
@endsection

@section('title-page')
   Edit | Data Ukuran Besi
@endsection

@section('sub-menu')
    <a href="{{ route('jenisbesi.index') }}" class="nav-link {{ set_active(['jenisbesi.index','jenisbesi.create','jenisbesi.edit']) }}">
        Jenis Besi
    </a>
    <a href="{{ route('ukuranbesi.index') }}" class="nav-link {{ set_active(['ukuranbesi.index','ukuranbesi.create','ukuranbesi.edit']) }}">
        Ukuran Besi
    </a>
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_nama_ukuranbesi', $ukuranbesi) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card card-warning">
            <div class="card-header">
                <p>Form Edit Ukuran Besi</p>
            </div>
          <div class="card-body">
            @include('components.form-control.ukuranbesi.form-edit-ukuranbesi')
          </div>
       </div>
    </div>
 </div>
@endsection




