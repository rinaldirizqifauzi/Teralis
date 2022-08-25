<div>
     <div class="form-group">
        <center>
            <strong>
                <label for="id_besi" class="font-weight-bold">
                    <strong style="font-family: 'Alike Angular', serif;">
                        Besi
                    </strong>
                </label>
            </strong>
        </center>
        <select wire:model="selectedBesi" id="id_besi"  name="id_besi" class="form-control @error('id_besi') is-invalid @enderror my-1" autocomplete="off" >
            <option value="" selected>Pilih Besi</option>
            @foreach($besis as $besi)
                <option value="{{ $besi->id }}">{{ $besi->nama_besi }}</option>
            @endforeach
        </select>
        @error('id_besi')
            <span style="color: red">
                <strong>
                    {{ $message }}
                </strong>
            </span>
        @enderror
     </div>
    @if (!is_null($selectedBesi))
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @foreach ($pilihs as $pilih)
                <div class="my-2">
                    <center>
                        <strong>
                            <label for="jenis_besi">Jenis Besi</label>
                        </strong>
                    </center>
                    <center>
                        <img id="gambar_jenis_besi" class="my-2" src="{{ asset('storage/'.$pilih->jenisbesi->image_jenis_besi)  }}" style="width:240px">
                    </center>
                </div>
                <div class="my-2">
                    <center>
                        <strong>
                            <label for="harga">Harga</label>
                        </strong>
                    </center>
                    <input type="text" value="{{ $pilih->jenisbesi->harga }}" name="harga" class="form-control my-1" id="harga" placeholder="Your Name" readonly>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
