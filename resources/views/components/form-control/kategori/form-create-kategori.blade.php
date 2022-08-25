<form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label for="input_nama_kategori" class="font-weight-bold">
                Nama Kategori
                </label>
                <input id="input_nama_kategori" value="{{ old('nama_kategori') }}" name="nama_kategori" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori"/>
                @error('nama_kategori')
                    <span style="color: red">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-primary px-4">Simpan</button>
        <a class="btn btn-secondary px-4" href="{{ route('kategori.index') }}">Kembali</a>
    </div>
 </form>
