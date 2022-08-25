<div>
    <div class="form-group row">
        <label for="id_ukuran" class="font-weight-bold">
            Ukuran Jendela
         </label>
        <select wire:model="selectedUkuran" id="id_ukuran" name="id_ukuran" class="form-control">
            <option value="" selected>Choose Ukuran</option>
            @foreach($ukuranbesis as $ukuranbesi)
                <option value="{{ $ukuranbesi->id }}" selected>{{ $ukuranbesi->ukuranbesi->nama_ukuran }}</option>
            @endforeach
        </select>
        @error('id_ukuran')
        <span style="color: red">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

    </div>
    @if (!is_null($selectedUkuran))
        <div class="form-group">
            @foreach ($pilihs as $pilih)
                <label for="input_hargaUkuran">Harga Ukuran / Jendela</label>
                <input type="text" id="input_hargaUkuran" class="form-control my-1" value="{{ $pilih->ukuranbesi->harga }}" name="hargaukuran" placeholder="Masukkan Harga Ukuran" type="text" readonly>
                <label for="input_rangeUkuran">Range Ukuran</label>
                <input type="text" id="input_rangeUkuran" class="form-control" value="{{ $pilih->ukuranbesi->range }}" name="rangeukuran" placeholder="Masukkan Range Ukuran" type="text" readonly>
            @endforeach
        </div>
    @endif
</div>
