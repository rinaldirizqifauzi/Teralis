@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">

        </div>
        <div class="col-lg-3">
            {{-- True --}}

        </div>
    </div>
        <div class="row">
            @forelse ($jenisbesis as $jenisbesi)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card product" style="width: 13rem;">
                    <div class="ribbon-wrapper  ribbon-lg">
                        <div class="ribbon">
                            <strong>Rp. {{ $jenisbesi->jenisbesi->harga }} </strong>
                        </div>
                      </div>
                    @if ($jenisbesi->jenisbesi->image_jenis_besi)
                        <img src="{{ asset('storage/' . $jenisbesi->jenisbesi->image_jenis_besi) }}" class="card-img-top" alt="">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <div class="card-body">
                        <center><a href="" >{{ $jenisbesi->nama_besi }}</a><br></center>
                        <center><a href="" >{{ $jenisbesi->ukuranbesi->nama_ukuran }}</a><br></center>
                    </div>
                </div>
            </div>
        @empty
        Tidak Ada Data
        @endforelse
    </div>
</div>
@endsection
