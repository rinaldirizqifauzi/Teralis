<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Lokasi',['only' => 'index']);
        $this->middleware('permission:Buat Data Lokasi',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Lokasi,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Lokasi',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $lokasis = Lokasi::where('nama_lokasi','LIKE','%'.$request->search. '%')->paginate(3);
        }else{
            $lokasis = Lokasi::paginate(3);
        }
        return view('data.lokasi.index',compact('lokasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = [
            'nama_lokasi' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Lokasi::create($validatedData);
        return redirect()->route('lokasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function show(Lokasi $lokasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokasi $lokasi)
    {
        return view('data.lokasi.edit',[
            'lokasi' => $lokasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokasi $lokasi)
    {
        $rules = [
            'nama_lokasi' => 'required'
        ];

        $validatedData = $request->validate($rules);

        Lokasi::where('id', $lokasi->id)->update($validatedData);
        return redirect()->route('lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokasi  $lokasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokasi $lokasi)
    {
        Lokasi::destroy($lokasi->id);
        return redirect()->route('lokasi.index');
    }
}
