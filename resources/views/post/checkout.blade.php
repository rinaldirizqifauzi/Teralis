@extends('welcome')

@section('title')
    Form Pemesanan | Teralis Jendela
@endsection

@section('home')
    <li><a href="/beranda" class="active">Beranda </a></li>
@endsection

@section('jenis_besi')
    <li><a href="{{ route('blog.jenisbesi') }}" class="active">Jenis Besi</a></li>
@endsection


@section('content')
<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
        <div class="row my-5">
          <div class="col-lg-8 entries" data-aos="zoom-out-right" data-aos-duration="500"  data-aos-anchor-placement="center-bottom" >
            <div class="blog-comments">
              <div class="reply-form" style="background-color: #ffffff">
                <form action="{{ route('pemesanan.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input id="harga_motif" value="{{ $posting->id_motifs->harga }}" name="harga_motif" type="hidden" class="form-control @error('harga_motif') is-invalid @enderror"  readonly/>
                        @error('harga_motif')
                            <span class="invalid-feedback">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="nama_motif" value="{{ $posting->id_motifs->nama_motif }}" name="nama_motif" type="hidden" class="form-control @error('nama_motif') is-invalid @enderror"  readonly/>
                        @error('nama_motif')
                            <span class="invalid-feedback">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                    </div>
                        <p style="">Ketentuan Pemesanan</p>
                        <ul>
                            <li>Perhatikan ID Pemesanan Untuk Konfirmasi Ke Admin</li>
                            <li>Hubungi Admin Via WhatsApp (082169148635) Untuk Konfirmasi ID Pemesanan</li>
                            <li>Setelah Konfirmasi Anda Akan Mendapatkan Kode Untuk Melanjutkan Transaksi Selanjutnya</li>
                        </ul>
                        <hr>
                    <h4 style="color:#db2b31; font-family: 'Cutive Mono', monospace;"><center>Buat Data Pemesanan</center></h4><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mx-2">
                                <center>
                                    <label for="input_data_id_pemesanan" style="font-family: 'Alike Angular', serif;">
                                        <strong>
                                            ID Pemesanan
                                        </strong>
                                    </label>
                                </center>
                                <div class="form-group">
                                    <input id="input_data_id_pemesanan" value="{{ 'ID-'.date('d-m-Y').'-'.$kd }}" name="id_pemesanan" type="text" class="form-control @error('id_pemesanan') is-invalid @enderror"  readonly/>
                                    @error('id_pemesanan')
                                        <span class="invalid-feedback">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mx-2">
                                <livewire:besidropdown/>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="nama" class="form-control @error('nama') is-invalid @enderror"  id="nama" value="{{ auth()->user()->name }}" placeholder="Masukkan Nama ..." autocomplete="off" >
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <center>
                                    <label for="input_jumlah" class="font-weight-bold">
                                        <strong style="font-family: 'Alike Angular', serif;">
                                            Jumlah Besi
                                        </strong>
                                    </label>
                                </center>
                                <input id="input_jumlah"  name="jumlah" type="number" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan Jumlah Besi" autocomplete="off"  />
                                @error('jumlah')
                                    <span style="color: red">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 float-end">
                            <button type="submit" id="submit" class="btn btn-md float-right" style="color: #ffffff; background-color: #db2b31" disabled>
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Pesan Sekarang
                            </button>
                        </div>
                    </div>

                </form>
              </div>
            </div><!-- End blog comments -->
          </div><!-- End blog entries list -->
          <div class="col-lg-4 my-5">
            <div class="sidebar" data-aos="zoom-out-left" data-aos-duration="1000" style="background-color: #ffffff">
              <h3 class="sidebar-title" style="color: #db2b31; font-family: 'Cutive Mono', monospace;">{{ $posting->id_motifs->nama_motif }}</h3>
              @if ($posting->id_motifs->image_motif)
              <img src="{{ asset('storage/' . $posting->id_motifs->image_motif) }}" style="height: 370px"  class="img-fluid" alt="">
              @else
                  <img class="img-preview img-fluid mb-3 col-sm-5">
              @endif
            </div><!-- End sidebar -->
          </div><!-- End blog sidebar -->
        </div>
      </div>
    </section><!-- End Blog Single Section -->
  </main><!-- End #main -->
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
        $('#select_lokasi').select2({
        theme: 'bootstrap4',
        allowClear: true,
        ajax: {
            url: "{{ route('lokasi.select.checkout') }}",
            dataType: 'json',
            delay: 250,
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                    return {
                        text: item.nama_lokasi,
                        id: item.id
                    }
                    })
                };
            }
        }
        });
    });
</script>
<script>
    const submitButton = document.getElementById("submit");
    const input_jumlah = document.getElementById("input_jumlah");
    const wilayah = document.getElementById("wilayah");


    input_jumlah.addEventListener("keyup", (e) => {
        const value = e.currentTarget.value;
        if (value === ""){
            submitButton.disabled = true;
        } else {
            submitButton.disabled = false;
        }
    })
</script>
@endpush
