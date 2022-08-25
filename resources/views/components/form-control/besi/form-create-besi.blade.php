<form action="{{ route('besi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_nama_besi" class="font-weight-bold">
                Nama Besi
                </label>
                <input id="input_nama_besi" value="{{ old('nama_besi') }}" name="nama_besi" type="text" class="form-control @error('nama_besi') is-invalid @enderror" placeholder="Masukkan Nama Besi"/>
                @error('nama_besi')
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
                <label for="select_jenis_besi" class="font-weight-bold">
                   Jenis Besi
                </label>
                <select name="id_jenis_besi" id="select_jenis_besi"  data-placeholder="Pilih Jenis Besi" class="custom-select w-100 @error('id_jenis_besi') is-invalid @enderror" >
                    @foreach ($jenisbesis as $jenisbesi)
                    <option value="{{ $jenisbesi->id }}"
                        @if (old('id_jenis_besi', $jenisbesi->jenis_besi)==$jenisbesi->id) selected = "selected" @endif>
                        {{  $jenisbesi->jenis_besi }}
                    </option>
                    @endforeach
                </select>
                <!-- error message -->
                @error('id_jenis_besi')
                    <span style="color: red">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="select_ukuran_besi" class="font-weight-bold">
                   Jenis Besi
                </label>
                <select name="id_ukuran_besi" id="select_ukuran_besi"  data-placeholder="Pilih Ukuran Besi" class="custom-select w-100 @error('id_ukuran_besi') is-invalid @enderror" >
                    @foreach ($ukuranbesis as $ukuranbesi)
                    <option value="{{ $ukuranbesi->id }}"
                        @if (old('id_ukuran_besi', $ukuranbesi->nama_ukuran)==$ukuranbesi->id) selected = "selected" @endif>
                        {{  $ukuranbesi->nama_ukuran }}
                    </option>
                @endforeach
                </select>
                <!-- error message -->
                @error('id_ukuran_besi')
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
        <a class="btn btn-secondary px-4" href="{{ route('besi.index') }}">Kembali</a>
    </div>
 </form>
