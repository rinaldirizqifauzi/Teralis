<form action="{{ route('besi.update', ['besi' => $besi]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_nama_besi" class="font-weight-bold">
                Nama Besi
                </label>
                <input id="input_nama_besi" value="{{ old('nama_besi', $besi->nama_besi) }}" name="nama_besi" type="text" class="form-control @error('nama_besi') is-invalid @enderror" placeholder="Masukkan Nama Besi"/>
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
                    @if (old('id_jenis_besi',$jenisBesiSelected))
                        <option value="{{ $besi->id }}" selected>
                            {{ $besi->jenisbesi->jenis_besi }}
                        </option>
                    @endif>
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
                   Ukuran Besi
                </label>
                <select name="id_ukuran_besi" id="select_ukuran_besi"  data-placeholder="Pilih Ukuran Besi" class="custom-select w-100 @error('id_ukuran_besi') is-invalid @enderror" >
                    @if (old('id_ukuran_besi',$ukuranBesiSelected))
                        <option value="{{ $besi->id }}" selected>
                            {{ $besi->ukuranbesi->nama_ukuran }}
                        </option>
                    @endif
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
        <button type="submit" class="btn btn-warning px-4">Edit</button>
        <a class="btn btn-secondary px-4" href="{{ route('besi.index') }}">Kembali</a>
    </div>
 </form>
