<div class="row">
    @foreach ($motifs as $motif)
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card mb-3 rounded" >
            <div class="row g-1">
                <div class="col-md-4">
                    <img src="{{ asset('storage/'. $motif->image_motif)  }}"  class="img-fluid rounded card-img-top" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $motif->nama_motif }}</h5>
                        <p class="card-text">Harga : Rp.{{ $motif->harga }}</p>
                        <p class="card-text"><small class="text-muted">{{ $motif->updated_at->diffForHumans() }}</small></p>
                            <div class="float-right">
                                @can('Ubah Data Motif')
                                <!-- edit -->
                                <a href="{{ route('motif.edit', ['motif' => $motif]) }}" class="btn btn-sm btn-warning" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endcan
                                @can('Hapus Data Motif')
                                <!-- delete -->
                                <form action="{{  route('motif.destroy', ['motif' => $motif])  }}" method="POST" role="alert"
                                    alert-title="Hapus Motif"  alert-text='Yakin menghapus motif  "{{ $motif->nama_motif }}" ' alert-btn-cancel="Batal" alert-btn-yes="Hapus"  class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

