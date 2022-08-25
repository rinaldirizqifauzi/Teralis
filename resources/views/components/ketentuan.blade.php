<div class="row">
    <div class="col-lg-8">
        <h3>Ketentuan</h3>
        <ul>
           @yield('ketentuan')
        </ul>
    </div>
    <div class="col-lg-4">
        <center>
            <h3>Hubungi Admin</h3>
        </center>
        <form action="kirim" method="POST"  target="_blank">
            @csrf
            <div class="form-group my-2">
                <input type="text" name="id_pemesanan" class="form-control" value="" placeholder="Masukkan ID Pemesanan ...">
            </div>
            <div class="form-group my-2">
                <input type="text" name="nama" class="form-control" value="" placeholder="Masukkan Nama ...">
            </div>
            <center>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </center>
        </form>
    </div>
</div>
