<?php

namespace App\Http\Controllers;

use App\Models\Besi;
use App\Models\Karyawan;
use App\Models\Pemesanan;
use App\Models\Ukuranbesi;
use Illuminate\Http\Request;
use App\Models\Laporankaryawan;

class LaporankaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Laporan Karyawan',['only' => 'index']);
        $this->middleware('permission:Buat Data Laporan Karyawan',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Laporan Karyawan,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Laporan Karyawan',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data.laporananggota.index' ,[
            'laporankaryawans' =>  Laporankaryawan::all(),
        ]);
    }


    public function selectAnggota(Request $request)
    {
        $karyawan = [];
        if ($request->has('q')) {
            $karyawan = Karyawan::select('id','nama_anggota')->search($request->q)->get();
        }else {
            $karyawan = Karyawan::select('id','nama_anggota')->limit(5)->get();
        }

        return response()->json($karyawan);
    }

    public function selectPemesanan(Request $request)
    {
        $pemesanans = Pemesanan::select('id', 'id_pemesanan')->limit(5);
        if ($request->has('q')) {
            $pemesanans->where('id_pemesanan', 'LIKE', "%{$request->q}%");
        }

        return response()->json($pemesanans->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.laporananggota.create', [
            'anggotas' => Karyawan::all(),
            'pemesanans' => Pemesanan::all(),
            'besis' => Besi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_pemesanan' => 'required',
            'id_anggota' => 'required',
            'tgl_lokasi' => 'required',
        ]);

        Laporankaryawan::create($validateData);
        return redirect()->route('laporan-karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporankaryawan  $laporankaryawan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporankaryawan $laporankaryawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporankaryawan  $laporankaryawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporankaryawan $laporan_karyawan)
    {
        return view('data.laporananggota.edit',[
            'ukuranbesis' => Ukuranbesi::all(),
            'anggotas' => Karyawan::all(),
            'pemesanans' => Pemesanan::all(),
            'laporan_karyawan' => $laporan_karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporankaryawan  $laporankaryawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporankaryawan $laporan_karyawan)
    {

       $rules =  [
            'tgl_lokasi' => 'required',
            'id_anggota' => 'required',
            'id_ukuran' => 'required',
            'hargaukuran' => 'required',
            'rangeukuran' => 'required',
            'id_pemesanan' => 'required',
            'panjang' => 'required',
            'lebar' => 'required',
        ];

        $validatedData = $request->validate($rules);

        Laporankaryawan::where('id', $laporan_karyawan->id)->update($validatedData);
        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporankaryawan  $laporankaryawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporankaryawan $laporan_karyawan)
    {
        Laporankaryawan::destroy($laporan_karyawan->id);
        return redirect()->route('laporan-karyawan.index');
    }
}
