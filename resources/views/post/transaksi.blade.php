@extends('welcome')

@section('title')
    Data Pemesanan | Teralis Jendela
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
          <div class="col-lg-12 my-3">
            <div class="blog-comments">
                @forelse ($pemesanan as $field)
                <div class="reply-form" style="background-color: #ffffff">
                  <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center">Id Pemesanan</th>
                                {{-- <th class="text-center">Id Motif</th> --}}
                                <th class="text-center">Nama Motif</th>
                                <th class="text-center">Nama </th>
                                <th class="text-center">Status </th>
                                <th class="text-center th-description">Harga Motif</th>
                                <th class="text-center th-description">Nama Besi</th>
                                <th class="text-center th-description">Jenis Besi</th>
                                <th class="text-center th-description">Ukuran Besi</th>
                                <th class="text-center th-description">Harga Besi / Batang </th>
                                <th class="text-center th-description">Jumlah </th>
                                <th class="text-center th-description">Total </th>
                                {{-- <th class="text-right">Qty</th>
                                <th class="text-right">Amount</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td  class="text-center ">
                                        <a href="">{{ $field->id_pemesanan }}</a>
                                </td>
                                <td class="text-center td-name">
                                    <a href="">{{ $field->nama_motif }}</a>
                                </td>
                                <td class="text-center td-name">
                                    <a href="">{{ $field->nama }}</a>
                                </td>
                                <td class="text-center td-name">
                                    <button class="btn {{ ($field->status == 1 ) ? 'btn-warning' : 'btn-success'}}">{{ ($field->status == 1) ? 'Proses' : 'Sukses' }}</button>
                                </td>
                                <td class="text-center">
                                    Rp. {{ $field->harga_motif }}
                                </td>
                                <td class="text-center">
                                    {{ $field->id_besis->nama_besi }}
                                </td>
                                <td class="text-center">
                                    {{ $field->id_besis->jenisbesi->jenis_besi }}
                                </td>
                                <td class="text-center">
                                    {{ $field->id_besis->ukuranbesi->nama_ukuran }} ({{  $field->id_besis->ukuranbesi->range}})
                                </td>
                                <td class="text-center">
                                    Rp. {{ $field->id_besis->jenisbesi->harga }}
                                </td>
                                <td>
                                     {{ $field->jumlah }}
                                </td>
                                <td>
                                    Rp.  {{ $field->harga }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                  </div>
                  <hr>
                  <a href="{{ route('blog.post.pembayaran', request()->get('search')) }}" class="btn btn-md btn-primary mx-3 float-end text-white">Masukkan Data Alamat</a>
                  <a href="{{ route('blog.post.search') }}" class="btn btn-md btn-info float-end text-white"> Kembali</a>
                </div>
                @empty
                Data Tidak Ada
                @endforelse
              </div>
          </div><!-- End blog sidebar -->
        </div>
      </div>
    </section><!-- End Blog Single Section -->
</main><!-- End #main -->

@endsection
