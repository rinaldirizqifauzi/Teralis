@extends('layouts.backend')

@section('title')
    Lokasi
@endsection

@section('title-page')
   Tambah | Data Lokasi
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('tambah_lokasi') }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('lokasi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="input_nama_lokasi" class="font-weight-bold">
                            Nama Lokasi
                            </label>
                            <input id="input_nama_lokasi" value="{{ old('nama_lokasi') }}" name="nama_lokasi" type="text" class="form-control @error('nama_lokasi') is-invalid @enderror" placeholder="Masukkan Nama Lokasi"/>
                            @error('nama_lokasi')
                                <span class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="float-right">
                	<a class="btn btn-primary px-4" href="{{ route('lokasi.index') }}">Kembali</a>
                	<button type="submit" class="btn btn-primary px-4">Simpan</button>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection




