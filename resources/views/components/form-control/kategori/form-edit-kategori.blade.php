<form action="{{ route('kategori.update', ['kategori' => $kategori]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input_nama_kategori" class="font-weight-bold">
                Nama Kategori
                </label>
                <input id="input_nama_kategori" value="{{ old('nama_kategori',$kategori->nama_kategori) }}" name="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori"/>
                @error('nama_kategori')
                    <span class="invalid-feedback">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-warning px-4">Edit</button>
        <a class="btn btn-secondary px-4" href="{{ route('kategori.index') }}">Kembali</a>
    </div>
 </form>
