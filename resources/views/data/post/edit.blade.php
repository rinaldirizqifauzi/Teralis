@extends('layouts.backend')

@section('title')
    Posting
@endsection

@section('title-page')
   Edit | Data Posting
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_judul_posting', $posting) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('posting.update', ['posting' => $posting]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="input_nama_posting" class="font-weight-bold">
                                   Nama Posting
                                </label>
                                <input id="input_nama_posting" value="{{ old('nama_posting', $posting->nama_posting) }}" name="nama_posting" type="text" class="form-control @error('nama_posting') is-invalid @enderror" placeholder="Masukkan Nama Posting"/>
                                @error('nama_posting')
                                    <span class="invalid-feedback">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                                <!-- error message -->
                                @error('id_motif')
                                    <span style="color: red">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok" class="font-weight-bold">
                                Stok
                            </label>
                            <input id="stok" value="{{ old('stok', $posting->stok) }}" name="stok" type="number" class="form-control @error('stok') is-invalid @enderror" placeholder="Masukkan Stok"/>
                            @error('stok')
                                <span class="invalid-feedback">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="select_motif" class="font-weight-bold">
                               Motif
                            </label>
                            <select name="id_motif" id="select_motif"  data-placeholder="Pilih Motif" class="custom-select w-100 @error('id_motif') is-invalid @enderror" >
                                @if (old('id_motif',$motifSelected))
                                    <option value="{{ $posting->id }}" selected>
                                        {{ $posting->id_motifs->nama_motif }}
                                    </option>
                                @endif>
                            </select>
                            <!-- error message -->
                            @error('id_motif')
                                <span style="color: red">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="select_kategori" class="font-weight-bold">
                               Kategori
                            </label>
                            <select name="id_kategori" id="select_kategori"  data-placeholder="Pilih Kategori" class="custom-select w-100 @error('id_kategori') is-invalid @enderror" >
                                @if (old('id_kategori',$kategoriSelected))
                                    <option value="{{ $posting->id }}" selected>
                                        {{ $posting->id_kategoris->nama_kategori }}
                                    </option>
                                @endif>
                            </select>
                            <!-- error message -->
                            @error('buku')
                                <span style="color: red">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="deskripsi" class="font-weight-bold " >Deskripsi</label>
                            @error('deskripsi')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                            <input id="deskripsi" type="hidden" name="deskripsi"  value="{{ old('deskripsi', $posting->deskripsi) }}">
                            <trix-editor input="deskripsi"></trix-editor>
                        </div>
                    </div>
                </div>
                <div class="float-right">
                	<a class="btn btn-primary px-4" href="{{ route('posting.index') }}">Kembali</a>
                	<button type="submit" class="btn btn-primary px-4">Edit</button>
                </div>
             </form>
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
       $(function(){
         $('#select_kategori').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('kategori.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama_kategori,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
       });
       $(function(){
         $('#select_motif').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('motif.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama_motif,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });

       });
            document.addEventListener('trix-file-accept', function(e){
                e.preventDefault();
            })
    </script>
@endpush




