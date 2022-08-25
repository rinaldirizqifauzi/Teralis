@foreach ($besis as $besi)
<div class="col-lg-4 mt-2">
    <div class="card mb-3"style="width: 12rem;">
        <img src="{{ asset('storage/'. $besi->jenisbesi->image_jenis_besi)  }}" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $besi->nama_besi }}</h5> <br>
            <h5 class="card-title">{{ $besi->ukuranbesi->nama_ukuran }},{{ $besi->jenisbesi->jenis_besi }}</h5> <br>
            <h6 class="card-title">Harga : Rp.{{ $besi->jenisbesi->harga }}</h6><br>
            <div class="float-right">
                @can('Ubah Data Besi')
                <!-- edit -->
                <a href="{{ route('besi.edit', ['besi' => $besi]) }}" class="btn btn-sm btn-warning" role="button">
                    <i class="fas fa-edit"></i>
                </a>
                @endcan
                @can('Hapus Data Besi')
                <!-- delete -->
                <form action="{{  route('besi.destroy', ['besi' => $besi])  }}" method="POST" role="alert"
                      alert-title="Hapus Besi" alert-text='Yakin menghapus besi "{{ $besi->nama_besi }}"' alert-btn-cancel="Batal" alert-btn-yes="Hapus" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                @endcan
            </div>
        </div>
    </div>

</div>
@endforeach
