<?php

namespace App\Http\Controllers;

use App\Models\Ukuranbesi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class UkuranbesiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Ukuran Besi',['only' => 'index']);
        $this->middleware('permission:Buat Data Ukuran Besi',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Ukuran Besi,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Ukuran Besi',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $ukuranbesis = Ukuranbesi::where('nama_ukuran','LIKE','%'.$request->search. '%')->paginate();
        }else{
            $ukuranbesis = Ukuranbesi::get();
        }

        return view('data.ukuranbesi.index',compact('ukuranbesis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.ukuranbesi.create');
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
            'nama_ukuran' => 'required',
            'range' => 'required',
            'harga' => 'required',
        ]);

        Ukuranbesi::create($validatedData);
        Alert::success('Data Ukuran Besi', 'Berhasil Ditambahkan !');
        return redirect()->route('ukuranbesi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ukuranbesi  $ukuranbesi
     * @return \Illuminate\Http\Response
     */
    public function show(Ukuranbesi $ukuranbesi)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ukuranbesi  $ukuranbesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Ukuranbesi $ukuranbesi)
    {
        return view('data.ukuranbesi.edit',[
            'ukuranbesi' =>  $ukuranbesi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ukuranbesi  $ukuranbesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ukuranbesi $ukuranbesi)
    {
        $rules = [
            'nama_ukuran' => 'required',
            'range' => 'required',
            'harga' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $ukuranbesi->update($validatedData);
        Alert::success('Data Ukuran Besi', 'Berhasil Diubah !');
        return redirect()->route('ukuranbesi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ukuranbesi  $ukuranbesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ukuranbesi $ukuranbesi)
    {
        Ukuranbesi::destroy($ukuranbesi->id);
        Alert::success('Data Ukuran Besi', 'Berhasil Dihapus !');

        return redirect()->route('ukuranbesi.index');
    }
}
