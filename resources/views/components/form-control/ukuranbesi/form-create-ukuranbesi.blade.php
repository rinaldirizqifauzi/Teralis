<form action="{{ route('ukuranbesi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_nama_ukuran" class="font-weight-bold">
                Nama Ukuran Besi
                </label>
                <input id="input_nama_ukuran" value="{{ old('nama_ukuran') }}" name="nama_ukuran" type="text" class="form-control @error('nama_ukuran') is-invalid @enderror" placeholder="Masukkan Nama Ukuran Besi"/>
                @error('nama_ukuran')
                    <span class="invalid-feedback">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_range_besi" class="font-weight-bold">
                Range Besi (Cm)
                </label>
                <input id="input_range_besi" value="{{ old('range') }}" name="range" type="text" class="form-control @error('range') is-invalid @enderror" placeholder="Masukkan Range Besi"/>
                @error('range')
                    <span class="invalid-feedback">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="input_harga" class="font-weight-bold">
                Harga
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input id="input_harga" value="{{ old('harga') }}" name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga"/>
                </div>
                @error('harga')
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
        <button type="submit" class="btn btn-primary px-4">Simpan</button>
        <a class="btn btn-secondary px-4" href="{{ route('ukuranbesi.index') }}">Kembali</a>
    </div>
 </form>
