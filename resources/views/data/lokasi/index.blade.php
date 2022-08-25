@extends('layouts.backend')

@section('title')
    Lokasi
@endsection

@section('title-page')
    Data Lokasi
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('lokasi') }}
@endsection


@section('content')
<!-- section:content -->
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                   <!-- Start kode untuk form pencarian -->
                   <form action="{{ route('lokasi.index') }}" method="GET">
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
                    @can('Buat Data Lokasi')
                    <a href="{{ route('lokasi.create') }}" class="btn btn-primary float-right" role="button">
                       Tambah Data
                       <i class="fas fa-plus-square"></i>
                    </a>
                    @endcan
                </div>
             </div>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-2">
                    <ul class="list-group list-group-flush">
                        @foreach ($lokasis as $index => $lokasi)
                        <!-- category list -->
                        <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                            <label class="mt-auto mb-auto"> {{ $lokasi->nama_lokasi }}  </label>
                           <div>
                            @can('Ubah Data Lokasi')
                            {{-- Edit --}}
                            <a href="{{ route('lokasi.edit', ['lokasi' => $lokasi]) }}" class="btn btn-sm btn-info" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                            @endcan
                            @can('Hapus Data Lokasi')
                            <!-- delete -->
                            <form action="{{  route('lokasi.destroy', ['lokasi' => $lokasi])  }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                           </div>
                          </li>
                          <!-- end  category list -->
                        @endforeach
                     </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="float-right">
        {!! $lokasis->links() !!}
    </div>
    </div>
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
