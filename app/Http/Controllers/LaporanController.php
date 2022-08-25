<?php

namespace App\Http\Controllers;


use App\Models\Pemesanan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:Tampil Data Laporan Pemesanan',['only' => 'index']);
        $this->middleware('permission:Struk Data Laporan Pemesanan',['only' => 'struck']);
        $this->middleware('permission:Ubah Data Laporan Pemesanan,',['only' => 'edit']);
    }

    public function index(){
        return view('data.laporan.index',[
            'pemesanans' => Pemesanan::paginate(7),
        ]);
    }

    public function struck($id){
        $pemesanans = Pemesanan::find($id);
        return view('data.laporan.struck', compact('pemesanans'));
    }

    public function edit($id){
        return view('data.laporan.edit', [
            'pemesanans' => Pemesanan::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $pemesanans = Pemesanan::find($id);

         $pemesanans->update([
            'kode_pemesanan' => $request->kode_pemesanan,
            'status' => $request->status,
        ]);

        return redirect()->route('laporan.index');
    }
}
