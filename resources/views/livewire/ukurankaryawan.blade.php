<div>
    <div class="form-group row">
        <label for="id_besi" class="font-weight-bold">
            Ukuran Jendela
         </label>
        <select wire:model="selectedUkuran" id="id_besi" name="id_besi" class="form-control">
            <option value="" selected>Choose Ukuran</option>
            @foreach($ukuranbesis as $ukuranbesi)
                <option value="{{ $ukuranbesi->id }}">{{ $ukuranbesi->ukuranbesi->nama_ukuran }}</option>
            @endforeach
        </select>
    </div>
    @if (!is_null($selectedUkuran))
            @foreach ($pilihs as $pilih)
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="input_hargaUkuran">Harga Ukuran / Jendela</label>
                        <input type="text" id="input_hargaUkuran" class="form-control my-1" value="{{ $pilih->ukuranbesi->harga }}" name="hargaukuran" placeholder="Masukkan Harga Ukuran" type="text" readonly>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="input_rangeUkuran">Range Ukuran</label>
                        <input type="text" id="input_rangeUkuran" class="form-control" value="{{ $pilih->ukuranbesi->range }}" name="rangeukuran" placeholder="Masukkan Range Ukuran" type="text" readonly>
                    </div>
                </div>
            </div>
            @endforeach
    @endif
</div>
