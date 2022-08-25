<ul class="list-group list-group-flush">
    @foreach ($kategoris as $index => $kategori)
    <!-- category list -->
    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
        <label class="mt-auto mb-auto"> {{ $kategori->nama_kategori }}  </label>
       <div>
        @can('Ubah Data Kategori')
            {{-- Edit --}}
            <a href="{{ route('kategori.edit', ['kategori' => $kategori]) }}" class="btn btn-sm btn-warning" role="button">
                <i class="fas fa-edit"></i>
            </a>
        @endcan
        @can('Hapus Data Kategori')
            <!-- delete -->
            <form action="{{  route('kategori.destroy', ['kategori' => $kategori])  }}" method="POST" role="alert"
                   alert-title="Hapus Kategori" alert-text='Yakin menghapus kategori "{{ $kategori->nama_kategori }}" '  alert-btn-cancel="Batal" alert-btn-yes="Hapus"  class="d-inline">
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
