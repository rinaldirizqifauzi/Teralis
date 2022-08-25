<form action="{{ route('jenisbesi.update', ['jenisbesi' => $jenisbesi]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_nama_jenisbesi" class="font-weight-bold">
                Nama Besi
                </label>
                <input id="input_nama_jenisbesi" value="{{ old('jenis_besi', $jenisbesi->jenis_besi) }}" name="jenis_besi" type="text" class="form-control @error('jenis_besi') is-invalid @enderror" placeholder="Masukkan Nama Jenis Besi"/>
                @error('jenis_besi')
                    <span style="color:red">
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
                Harga
                </label>
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input id="input_harga" value="{{ old('harga', $jenisbesi->harga) }}" name="harga" type="number" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga"/>
                </div>
                @error('harga')
                    <span style="color:red">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label for="image_jenis_besi">Gambar</label><br>
                {{ $jenisbesi->image_jenis_besi }}
                <div class="row">
                    <div class="col-lg-3">
                        <input type="hidden" name="oldImage" value="{{ $jenisbesi->image_jenis_besi }}">
                        @if ($jenisbesi->image_jenis_besi)
                            <img src="{{ asset('storage/' . $jenisbesi->image_jenis_besi) }}" class="img-preview"  style="width: 250px">
                        @else
                            <img class="img-preview" style="width: 250px">
                        @endif
                    <img class="img-preview" style="width: 250px">
                    </div>
                    <div class="col-lg-9 my-4">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('image_jenis_besi') is-invalid @enderror" value="{{ old('image_jenis_besi') }}" id="image_jenis_besi" name="image_jenis_besi" accept="image/jpeg,image/png" onchange="previewImage()">
                                <label class="custom-file-label" for="image_jenis_besi">{{ $jenisbesi->image_jenis_besi }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                @error('image_jenis_besi')
                <span style="color:red">
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
        <a class="btn btn-secondary px-4" href="{{ route('jenisbesi.index') }}">Kembali</a>
    </div>
</form>
