<table id="myTable" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Nama Ukuran</th>
      <th>Range</th>
      <th>Harga</th>
      <th>Manage</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($ukuranbesis as $ukuranbesi)
        <tr>
            <td> {{ $ukuranbesi->nama_ukuran }}</td>
            <td> {{ $ukuranbesi->range }}</td>
            <td> {{ $ukuranbesi->harga }}</td>
            <td>
                @can('Ubah Data Ukuran Besi')
                {{-- Edit --}}
                 <a href="{{ route('ukuranbesi.edit', ['ukuranbesi' => $ukuranbesi]) }}" class="btn btn-sm btn-warning" role="button">
                    <i class="fas fa-edit"></i>
                </a>
                @endcan
                @can('Hapus Data Ukuran Besi')
                {{-- Hapus --}}
                <form action="{{  route('ukuranbesi.destroy', ['ukuranbesi' => $ukuranbesi])  }}" method="POST"  role="alert"
                    alert-title="Hapus Besi" alert-text='Yakin menghapus ukuran besi "{{ $ukuranbesi->nama_ukuran }}"' alert-btn-cancel="Batal" alert-btn-yes="Hapus" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                </form>
                @endcan
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
