@extends('welcome')

@section('title')
    Struck Pemesanan | Teralis Jendela
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
        <div class="row justify-content-center">
            <div class="col-lg-8 my-3">
                <div class="blog-comments">
                    <h3 class="my-5"><center>Struck Pemesanan</center></h3>
                    <div class="reply-form" style="background-color: #ffffff">
                        <h4><center>Bengkel Las Kubu Ambacang</center></h4><br><br>
                        @forelse ($pemesanan as $field)
                            <center>ID Pemesanan    : <strong>{{ $field->id_pemesanan }}</strong> <br></center>
                            <center>  Nama Pemesanan  : <strong>{{ $field->nama }}</strong> <br></center>
                            <center>Nama Motif  : <strong>{{ $field->nama_motif }}</strong> <br> </center>
                            <center>Harga Motif  : <strong>Rp . {{ $field->harga_motif }}</strong> <br> </center>
                            <center>Nama Besi  : <strong> {{ $field->id_besis->nama_besi }}</strong> <br> </center>
                            <center>Jenis Besi  : <strong> {{ $field->id_besis->jenisbesi->jenis_besi }}</strong> <br> </center>
                            <center>Ukuran Besi  : <strong> {{ $field->id_besis->ukuranbesi->nama_ukuran }}</strong> <br> </center>
                            <center>Jumlah Besi  : <strong> {{ $field->jumlah }}/Meter</strong> <br> </center>
                            <center>Harga Jenis Besi  : <strong> Rp.{{ $field->id_besis->jenisbesi->harga }}</strong> <br> </center>
                            <hr>
                                <p>Kabupaten / Kota : {{  $field->id_kabupaten->name }}</p>
                                <p>Kecamatan : {{  $field->id_kecamatan->name }}</p>
                                <p>Desa : {{  $field->id_desa->name }}</p>
                            <hr>
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <strong>Status Pemesanan</strong>   <h3 class=" {{ ($field->status == 1 ) ? 'text-warning' : 'text-success'}}">{{ ($field->status == 1) ? 'Proses' : 'Sukses' }}</h3>
                                </div>
                                <div class="col-lg-3">
                                    <strong>Total</strong>   <h3> {{ $field->harga }}</h3>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div><!-- End blog sidebar -->
            </div>
        </div>
      </div>
    </section><!-- End Blog Single Section -->
</main><!-- End #main -->
@endsection

