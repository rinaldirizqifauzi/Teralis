@extends('welcome')

@section('title')
    Spesifikasi | Teralis Jendela
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
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
          <div class="row my-5">
            <div class="col-lg-8 entries">
                <h3 style="color:#d9232d; font-family: 'Alike Angular', serif;"><center>Spesifikasi</center></h3>
                <div class="blog-author  align-items-center" style="background-color: #ffffff">
                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                    <div>
                        <h4 style="font-family: 'Alike Angular', serif;">
                            {{ $posting->id_motifs->nama_motif }} <p class="float-end">"{{ $posting->id_kategoris->nama_kategori }}"</p>
                        </h4>
                        <h4 class="my-2 float-end" style="font-family: 'Cutive Mono', monospace;">
                           Harga <strong>   Rp. {{ $posting->id_motifs->harga }}</strong>
                        </h4><hr><br>
                        <p style="font-family: 'Playfair Display', serif;">
                            {!! $posting->deskripsi !!}
                        </p>
                    </div>
                    <a href="{{ route('blog.post.checkout',['id' => $posting->id]) }}" class="btn float-end" style="color: white; background:#d9232d; ">Pesan Sekarang</a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar" data-aos="zoom-out-left" data-aos-duration="1000" style="background-color: #ffffff">
                    @if ($posting->id_motifs->image_motif)
                    <h3 class="sidebar-title" style="color:#d9232d; font-family: 'Alike Angular', serif;">{{ $posting->nama_posting }}</h3>
                        <img src="{{ asset('storage/' . $posting->id_motifs->image_motif) }}" style="height: 370px"  class="img-fluid" alt="">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                </div>
            </div>
          </div>
        </div>
     </section>
</main>
@endsection
