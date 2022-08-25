@foreach ($jenisbesis as $jenisbesi)
<div class="col-lg-3 mt-2">
    <div class="card mb-3"style="width: 12rem;">
        <img src="{{ asset('storage/'. $jenisbesi->image_jenis_besi)  }}" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ $jenisbesi->jenis_besi }}</h5> <br>
            <h6 class="card-title">Harga : Rp.{{ $jenisbesi->harga }}</h6><br>
            <div class="float-right">
                @can('Ubah Data Jenis Besi')
                <!-- edit -->
                <a href="{{ route('jenisbesi.edit', ['jenisbesi' => $jenisbesi]) }}" class="btn btn-sm btn-warning" role="button">
                    <i class="fas fa-edit"></i>
                </a>
                @endcan
                @can('Hapus Data Jenis Besi')
                <!-- delete -->
                <form action="{{  route('jenisbesi.destroy', ['jenisbesi' => $jenisbesi])  }}" method="POST" role="alert"
                    alert-title="Hapus Besi" alert-text='Yakin menghapus jenis besi "{{ $jenisbesi->jenis_besi }}"' alert-btn-cancel="Batal" alert-btn-yes="Hapus" class="d-inline">
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
