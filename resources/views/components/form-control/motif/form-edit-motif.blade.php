<form action="{{ route('motif.update', ['motif' => $motif]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_nama_motif" class="font-weight-bold">
                Nama Motif
                </label>
                <input id="input_nama_motif" value="{{ old('nama_motif', $motif->nama_motif) }}" name="nama_motif" type="text" class="form-control @error('nama_motif') is-invalid @enderror" placeholder="Masukkan Nama Motif"/>
                @error('nama_motif')
                    <span style="color: red">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_harga" class="font-weight-bold">
                    Harga Motif
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input id="input_harga" value=" {{ old('harga', $motif->harga) }}" name="harga" type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga"/>
                </div>
                @error('harga')
                <span style="color: red">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
            @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="image_motif">Gambar</label>
                <p>{{ $motif->image_motif }}</p>
                <div class="row">
                    <div class="col-lg-3">
                        <input type="hidden" name="oldImage" value="{{ $motif->image_motif }}">
                        @if ($motif->image_motif)
                        <img src="{{ asset('storage/' . $motif->image_motif) }}" class="img-preview" style="width: 250px">
                        @else
                            <img class="img-preview" style="width: 250px">
                        @endif
                    </div>
                    <div class="col-lg-9">
                        <img class="img-preview" style="width: 250px">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image_motif') is-invalid @enderror" value="{{ old('image_motif') }}" id="image_motif" name="image_motif" accept="image/jpeg,image/png" onchange="previewImage()">
                                <label class="custom-file-label" for="image_motif">Ubah Gambar</label>
                            </div>
                        </div>
                    </div>
                </div>
                @error('image_motif')
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
        <button type="submit" class="btn btn-warning px-4">Edit</button>
        <a class="btn btn-secondary px-4" href="{{ route('motif.index') }}">Kembali</a>
    </div>
 </form>
