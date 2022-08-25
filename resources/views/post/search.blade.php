@extends('welcome')

@section('title')
    Kode Pemesanan | Teralis Jendela
@endsection

@section('home')
    <li><a href="/beranda" class="active">Beranda </a></li>
@endsection

@section('jenis_besi')
    <li><a href="{{ route('blog.jenisbesi') }}" class="active">Jenis Besi</a></li>
@endsection


@section('ketentuan')
<li><p style="color: red">Hubungi Admin Via WhatsApp (082169148635) Untuk Mendapatkan Kode</p></li>
<li><p style="color: red">Setelah Mendapatkan Kode Dari Admin Silahkan Lanjutkan Pembayaran Dengan Memasukan Kode</p></li>
<li><p style="color: red">Apabila Kode Yang Sudah Diberikan Admin Tidak Valid Silahkan Hubungi Admin </p></li>
<li><p style="color: red">Jika Ingin Melihat Halaman Pencarian Ini Terdapat Dihalaman Homepage </p></li>
@endsection


@section('content')
<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="row my-5">
            <div class="container">
                <div class="container my-5" data-aos="fade-up">
                    @include('components.ketentuan')
                    <div class="sidebar my-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="sidebar-title"><center>Kode Pemesanan</center></h3>
                                <div class="sidebar-item search-form">
                                <form action="{{ route('blog.post.transaksi') }}" method="GET">
                                    <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Masukkan Kode Pemesanan ...">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                                </div><!-- End sidebar search formn-->
                            </div>
                            <div class="col-lg-6">
                                <h3 class="sidebar-title"><center>Struck Pemesanan</center></h3>
                                <div class="sidebar-item search-form">
                                <form action="{{ route('blog.post.struck') }}" method="GET">
                                    <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Masukkan Kode Struck Pemesanan ...">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                                </div><!-- End sidebar search formn-->
                            </div>
                        </div>
                    </div><!-- End sidebar -->
                </div>
            </div>
      </div>
    </section><!-- End Blog Single Section -->
</main><!-- End #main -->
@endsection
