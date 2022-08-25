@extends('welcome')

@section('content')

<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container">
          <div class="row my-5">
            @include('components.ketentuan')
            <div class="col-lg-12 my-3">
                <div class="blog-comments">
                    <div class="reply-form" style="background-color: #ffffff">
                        <form action="{{ route('blog.post.update.transaksi', ['id' => $pemesanans->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <center>
                                            <label for="provinsi" class="font-weight-bold">
                                                <strong style="font-family: 'Alike Angular', serif;">
                                                    Pilih Provinsi
                                                </strong>
                                            </label>
                                        </center>
                                        <select name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror" >
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($provinces as $provinsi)
                                                <option value="{{ $provinsi->id }}" >{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('provinsi')
                                            <span style="color: red">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <label for="kecamatan" class="font-weight-bold">
                                                <strong style="font-family: 'Alike Angular', serif;">
                                                    Pilih Kecamatan
                                                </strong>
                                            </label>
                                        </center>
                                        <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" >

                                        </select>
                                        @error('kecamatan')
                                            <span style="color: red">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <center>
                                            <label for="kabupaten" class="font-weight-bold">
                                                <strong style="font-family: 'Alike Angular', serif;">
                                                    Pilih Kabupaten
                                                </strong>
                                            </label>
                                        </center>
                                        <select name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" >

                                        </select>
                                        @error('kabupaten')
                                            <span style="color: red">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <center>
                                            <label for="desa" class="font-weight-bold">
                                                <strong style="font-family: 'Alike Angular', serif;">
                                                    Pilih Desa
                                                </strong>
                                            </label>
                                        </center>
                                        <select name="desa" id="desa" class="form-control @error('desa') is-invalid @enderror" >

                                        </select>
                                        @error('desa')
                                            <span style="color: red">
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <hr>
                            </div>
                            <button type="submit" class="btn btn-md mx-2 btn-primary float-end text-white">Submit</button>
                            <a href="{{ route('blog.post.search') }}" class="btn btn-md btn-info float-end text-white"> Kembali</a>
                        </form>
                    </div>
                </div><!-- End blog sidebar -->
            </div>
        </div>
      </div>
    </section><!-- End Blog Single Section -->
</main><!-- End #main -->
@endsection

