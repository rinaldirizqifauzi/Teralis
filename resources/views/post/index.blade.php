@extends('welcome')

@section('title')
    Beranda | Teralis Jendela
@endsection


@section('home')
    <li><a href="/" class="active">Home </a></li>
@endsection

@section('jenis_besi')
    <li><a href="{{ route('blog.jenisbesi') }}" class="active">Jenis Besi</a></li>
@endsection



@section('content')
<main id="main">
    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
           <div class="row my-4">
                <div div class="col-lg-3 col-md-4 col-sm-12">
                    <section id="blog" class="blog">
                        <div class="container">
                            @forelse ($kategoris as $kategori)
                                <div data-aos="zoom-out-right" data-aos-duration="2000">
                                    <a href="{{ route('blog.post.category', ['id' => $kategori]) }}">
                                        <div class="sidebar" style="background-color: white">
                                            <center>{{ $kategori->nama_kategori }}</center>
                                        </div>
                                    </a>
                                </div>
                            @empty
                            Data Kategori Tidak Ada
                            @endforelse
                    </div>
                    </section>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="container ">
                        <div class="row my-3 justify-content-center">
                            @forelse ($posts as $post)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div data-aos="fade-up" data-aos-duration="2000">
                                    <div class="member my-2 ">
                                        <center>
                                            <h8 style="font-family: 'Alike Angular', serif;">{{ $post->nama_posting }}</h8>
                                            <img src="{{ asset('storage/' . $post->id_motifs->image_motif) }}" class="img-fluid my-3" style="transition: 0.5s" alt="">
                                        </center>
                                        <center>
                                            <p>Harga</p>
                                            <strong style="font-family: 'Cutive Mono', monospace;">Rp.{{ $post->id_motifs->harga }}</strong><hr>
                                            <a href="{{ route('blog.post.detail',['id' => $post->id]) }}" class="btn btn-sm" style="color: white; background-color:#d9232d">Spesifikasi</a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            @empty
                                Tidak Ada Data
                            @endforelse
                        </div>
                    </div>
                </div>

           </div>
    </section><!-- End Team Section -->
  </main>
@endsection
