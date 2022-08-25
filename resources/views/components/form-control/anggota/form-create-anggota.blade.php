<form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="input_nama_anggota" class="font-weight-bold">
                Nama Anggota
                </label>
                <input id="input_nama_anggota" value="{{ old('nama_anggota') }}" name="nama_anggota" type="text" class="form-control @error('nama_anggota') is-invalid @enderror" placeholder="Masukkan Nama Anggota"/>
                @error('nama_anggota')
                    <span style="color: red">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="input_no_hp" class="font-weight-bold">
                Nomor Handphone/Whatsapp
                </label>
                <input id="input_no_hp" value="{{ old('nohp') }}" name="nohp" type="number" class="form-control @error('nohp') is-invalid @enderror" placeholder="Masukkan Nomor Hp/Wa"/>
                @error('nohp')
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
                <label for="jenis_kelamin" style="margin-bottom: 15px">Jenis Kelamin</label>
                <div class="row" style="margin-bottom:23px">
                    <div class="col-lg-6">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="jeniskelamin1" name="jenis_kelamin" value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'checked' : '' }}>
                            <label for="jeniskelamin1" class="custom-control-label" style="font-weight:normal">Laki-Laki</label>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" type="radio" id="jeniskelamin2" name="jenis_kelamin" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            <label for="jeniskelamin2" class="custom-control-label"style="font-weight:normal">Perempuan</label>
                          </div>
                    </div>
                </div>
                @error('jenis_kelamin')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="image_ktp">Foto</label> <br>
                @error('image_ktp')
                    <span style="color: red">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input @error('image_ktp') is-invalid @enderror" value="{{ old('image_ktp') }}" id="image_ktp" name="image_ktp" accept="image/jpeg,image/png" onchange="previewImage()">
                    <label class="custom-file-label" for="image_ktp">Masukkan Foto</label>
                </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Alamat Lengkap</label>
                <textarea name="alamat" class="form-control @error('alamat') is-invalid
                @enderror" rows="3" placeholder="Masukkan Alamat ...">{{ old('alamat') }}</textarea>
                @error('alamat')
                <div style="color: red">
                    <strong>
                        {{ $message }}
                    </strong>
                </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="float-right">
        <button type="submit" class="btn btn-primary px-4">Simpan</button>
        <a class="btn btn-secondary px-4" href="{{ route('karyawan.index') }}">Kembali</a>
    </div>
 </form>
