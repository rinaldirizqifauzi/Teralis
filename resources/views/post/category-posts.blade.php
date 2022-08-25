@extends('welcome')

@section('title')
    Kategori | Teralis Jendela
@endsection

@section('home')
    <li><a href="/beranda" class="active">Beranda </a></li>
@endsection

@section('jenis_besi')
    <li><a href="{{ route('blog.jenisbesi') }}" class="active">Jenis Besi</a></li>
@endsection

@section('content')
    <!-- ======= Team Section ======= -->
<section id="team" class="team ">
        <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row justify-content-center">
                @forelse ($kategoris as $kategori)
                <div class="col-lg-4">
                  <section id="blog" class="blog">
                      <a href="{{ route('blog.post.category', ['id' => $kategori]) }}">
                          <div class="container" data-aos="fade-up">
                              <div class="sidebar" style="background-color: white">
                                  <center>{{ $kategori->nama_kategori }}</center>
                              </div>
                          </div>
                      </a>
                  </section>
                </div>
                @empty

                @endforelse
                <h2 ><center>{{ $category->nama_kategori }}</center></h2>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
        <div class="container">
          <div class="row justify-content-center">
              @forelse ($posts as $post)
              <div class="col-lg-3">
                  <div class="member  align-items-center">
                  <div class="row">
                      <h4>{{ $post->nama_posting }}</h4>
                      <img src="{{ asset('storage/' . $post->id_motifs->image_motif) }}" class="my-3" style="transition: 0.5s" alt="">
                      <div class="member-info mt-2">
                          <h4>Rp. {{ $post->id_motifs->harga }}</h4>
                              <a href="{{ route('blog.post.detail',['id' => $post->id]) }}">Spesifikasi</a>
                      </div>
                  </div>
                  </div>
              </div>
              @empty
                  Tidak Ada Data
              @endforelse
          </div>

        </div>
</section><!-- End Team Section -->
@endsection
