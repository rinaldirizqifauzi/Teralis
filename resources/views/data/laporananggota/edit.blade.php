@extends('layouts.backend')

@section('title')
    Laporan Karyawan
@endsection

@section('title-page')
   Edit | Anggota Orderan
@endsection

@section('sub-menu')
    @can('laporan_show')
    <a href="{{ route('laporan.index') }}" class="nav-link {{ set_active(['laporan.index','laporan.edit','laporan.create', 'laporan.struck']) }}">
        Laporan Pemesan
    </a>
    @endcan
    @can('laporankaryawans_show')
    <a href="{{ route('laporan-karyawan.index') }}" class="nav-link {{ set_active(['laporan-karyawan.index','laporan-karyawan.create','laporan-karyawan.edit']) }}">
        Laporan Anggota
    </a>
    @endcan
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_laporan_nama_anggota', $laporan_karyawan) }}
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
            <form action="{{ route('laporan-karyawan.update',['laporan_karyawan' => $laporan_karyawan]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="tgl_lokasi">
                            Tanggal Lokasi Pemesanan
                        </label>
                        <input type="date" name="tgl_lokasi" id="tgl_lokasi" value="{{ old('tgl_lokasi',  $laporan_karyawan->tgl_lokasi) }}" class="form-control @error('tgl_lokasi') is-invalid  @enderror" >
                        @error('tgl_lokasi')
                            <span style="color: red">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="select_anggota" class="font-weight-bold">
                           Pilih Anggota
                        </label>
                        <select name="id_anggota" id="select_anggota"  data-placeholder="Pilih Anggota" class="custom-select w-100 @error('id_anggota') is-invalid @enderror" >
                            @foreach ($anggotas as $anggota)
                                <option value="{{ $anggota->id }}"
                                    <option value="{{ $anggota->id }}" selected>{{ $anggota->nama_anggota }}</option>
                                </option>
                            @endforeach
                        </select>
                        <!-- error message -->
                        @error('id_anggota')
                            <span style="color: red">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <livewire:ukurandropdown />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="select_pemesanan" class="font-weight-bold">
                           Pilih ID Pemesanan
                        </label>
                        <select name="id_pemesanan" id="select_pemesanan"  data-placeholder="Pilih ID Pemesanan" class="custom-select w-100 @error('id_pemesanan') is-invalid @enderror">
                            @foreach ($pemesanans as $pemesanan)
                            <option value="{{ $pemesanan->id }}"
                                @if (old('id_pemesanan', $pemesanan->id_pemesanan)==$pemesanan->id) selected = "selected" @endif>
                                {{  $pemesanan->id_pemesanan }}
                            </option>
                            @endforeach
                        </select>
                        <!-- error message -->
                        @error('id_pemesanan')
                            <span style="color: red">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="input_panjang" class="font-weight-bold">
                                        Panjang
                                    </label>
                                    <input id="input_panjang" value="{{ old('panjang',  $laporan_karyawan->panjang) }}" name="panjang" type="number" class="form-control @error('panjang') is-invalid  @enderror" placeholder="Masukkan Panjang (Cm)"/>
                                    @error('panjang')
                                        <span style="color: red">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="input_lebar" class="font-weight-bold">
                                        Lebar
                                    </label>
                                    <input id="input_lebar" value="{{ old('lebar', $laporan_karyawan->lebar) }}" name="lebar" type="number" class="form-control @error('lebar') is-invalid  @enderror" placeholder="Masukkan Lebar (Cm)"/>
                                    @error('lebar')
                                        <span style="color: red">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
                <div class="float-right">
                    <a href="{{ route('laporan-karyawan.index') }}" class="btn  btn-primary">Kembali</a>
                    <button type="submit" class="btn  btn-primary">Edit</button>
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
         $('#select_anggota').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('anggota.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.nama_anggota,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
         $('#select_pemesanan').select2({
            theme: 'bootstrap4',
            allowClear: true,
            ajax: {
               url: "{{ route('pemesanan.select') }}",
               dataType: 'json',
               delay: 250,
               processResults: function(data) {
                  return {
                     results: $.map(data, function(item) {
                        return {
                           text: item.id_pemesanan,
                           id: item.id
                        }
                     })
                  };
               }
            }
         });
       });
</script>
@endpush


