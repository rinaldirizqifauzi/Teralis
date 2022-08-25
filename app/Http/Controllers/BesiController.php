<?php

namespace App\Http\Controllers;

use App\Models\Besi;
use App\Models\Jenisbesi;
use App\Models\Ukuranbesi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BesiController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:Tampil Data Besi',['only' => 'index']);
        $this->middleware('permission:Buat Data Besi',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Besi,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Besi',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $besis = Besi::where('nama_besi','LIKE','%'.$request->search. '%')->paginate(3);
        }else{
            $besis = Besi::paginate(6);
        }
        return view('data.besi.index',compact('besis'));
    }

    public function selectJenisBesi(Request $request)
    {
        $jensibesi = Jenisbesi::select('id', 'jenis_besi')->limit(5);
        if ($request->has('q')) {
            $jensibesi->where('jenis_besi', 'LIKE', "%{$request->q}%");
        }

        return response()->json($jensibesi->get());
    }

    public function selectUkuranBesi(Request $request)
    {
        $ukuranbesi = Ukuranbesi::select('id', 'nama_ukuran')->limit(5);
        if ($request->has('q')) {
            $ukuranbesi->where('jenis_besi', 'LIKE', "%{$request->q}%");
        }

        return response()->json($ukuranbesi->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.besi.create',[
            'jenisbesis' => Jenisbesi::all(),
            'ukuranbesis' =>  Ukuranbesi::all(),
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
        $validatedData = $request->validate([
            'nama_besi' => 'required',
            'id_jenis_besi' => 'required',
            'id_ukuran_besi' => 'required',
        ],[
            'nama_besi.required' => 'Nama Besi Wajib Diisi !!',
            'id_jenis_besi.required' => 'Pilih Jenis Besi !!',
            'id_ukuran_besi.required' => 'Pilih Ukuran Besi !!',
        ]);

        Besi::create($validatedData);
        Alert::success('Data Besi', 'Berhasil Ditambahkan !');
        return redirect()->route('besi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Besi  $besi
     * @return \Illuminate\Http\Response
     */
    public function show(Besi $besi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Besi  $besi
     * @return \Illuminate\Http\Response
     */
    public function edit(Besi $besi)
    {
        return view('data.besi.edit',[
            'besi' => $besi,
            'jenisBesiSelected' => $besi->first(),
            'ukuranBesiSelected' => $besi->first(),
        ]);
    }

    /**
     * Update the specified  resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Besi  $besi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Besi $besi)
    {
        $validatedData = $request->validate([
            'nama_besi' => 'required',
            'id_jenis_besi' => 'required',
            'id_ukuran_besi' => 'required',
        ],[
            'nama_besi.required' => 'Nama Besi Wajib Diisi !!',
            'id_jenis_besi.required' => 'Pilih Jenis Besi !!',
            'id_ukuran_besi.required' => 'Pilih Ukuran Besi !!',
        ]);


        Besi::where('id', $besi->id)->update($validatedData);
        Alert::success('Data Besi', 'Berhasil Diubah !');
           return redirect()->route('besi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Besi  $besi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Besi $besi)
    {
        Besi::destroy($besi->id);
        Alert::success('Data Besi', 'Berhasil Dihapus !');
        return redirect()->route('besi.index');
    }
}
