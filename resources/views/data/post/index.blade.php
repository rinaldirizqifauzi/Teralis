@extends('layouts.backend')

@section('breadcrumbs')
    {{ Breadcrumbs::render('posting') }}
@endsection

@section('title')
    Posting
@endsection

@section('title-page')
    Data Posting
@endsection

@section('breadcrumbs')
    {{-- {{ Breadcrumbs::render('buku') }} --}}
@endsection


@section('content')
<!-- section:content -->
<div class="card my-1">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
               <!-- Start kode untuk form pencarian -->
               <form action="{{ route('posting.index') }}" method="GET">
                <div class="input-group">
                   <input name="search" type="search" class="form-control" placeholder="Masukkan keyword" value="{{ request()->get('search') }}">
                   <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                         <i class="fas fa-search"></i>
                      </button>
                   </div>
                </div>
             </form>
            </div>
            <div class="col-md-6">
                @can('Buat Data Posting')
                <a href="{{ route('posting.create') }}" class="btn btn-primary float-right" role="button">
                   Tambah Data
                   <i class="fas fa-plus-square"></i>
                </a>
                @endcan
            </div>
         </div>
      </div>
    <div class="card-body">
        @foreach ($postings as $posting)
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('storage/'. $posting->id_motifs->image_motif)  }}" width="230px" height="180px" alt="">
            </div>
            <div class="col-md-4">
                <table>
                <tr>
                    <th>
                        Nama Posting
                    </th>
                    <td>:</td>
                    <td>
                        {{ $posting->nama_posting }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Nama Motif
                    </th>
                    <td>:</td>
                    <td>
                        {{ $posting->id_motifs->nama_motif }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Nama Kategori
                    </th>
                    <td>:</td>
                    <td>
                        {{ $posting->id_kategoris->nama_kategori }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Stok
                    </th>
                    <td>:</td>
                    <td>
                        {{ $posting->stok }}
                    </td>
                </tr>
                </table>
            </div>
            <div class="col-md-5">
                <center>
                    <label>
                        Deskripsi
                    </label>
                </center>
                {!! $posting->deskripsi  !!}
            </div>
        </div>
        <center>
            <p class="text-muted">
               Diposting Pada Tanggal {{ $posting->created_at->format('d, M Y') }} Pukul {{  $posting->created_at->format('H:i') }}
            </p>
        </center>
        <div class="float-right">
            <!-- edit -->
            @can('Ubah Data Posting')
            <a href="{{ route('posting.edit', ['posting' => $posting]) }}" class="btn btn-sm btn-info" role="button">
                <i class="fas fa-edit"></i>
            </a>
            @endcan
            <!-- delete -->
            @can('Hapus Data Posting')
            <form action="{{  route('posting.destroy', ['posting' => $posting])  }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
            </form>
            @endcan
        </div>
        @endforeach
    </div>
</div>
<div class="float-right">
    {!! $postings->links() !!}
</div>
@endsection

@push('javascript-internal')
    <script>
       $(document).ready(function(){
         //event :delete
         $("form[role='alert']").submit(function(event){
            event.preventDefault();
               Swal.fire({
                  title: $(this).attr('alert-title'),
                  text:  $(this).attr('alert-text'),
                  icon: 'warning',
                  allowOutsideClick: false,
                  showCancelButton: true,
                  cancelButtonText: "Tidak",
                  reverseButtons: true,
                  confirmButtonText: "Iya",
               }).then((result) => {
                  if (result.isConfirmed) {
                     event.target.submit();
                  }
               });
         })
       })


    </script>
@endpush
