<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Tampil Data Kategori',['only' => 'index']);
        $this->middleware('permission:Buat Data Kategori',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Kategori',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Kategori',['only' => 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ($request->has('search')) {
                $kategoris = Kategori::where('nama_kategori','LIKE','%'.$request->search. '%')->paginate(3);
            }else{
                $kategoris = Kategori::paginate(10);
            }
        return view('data.kategori.index',compact('kategoris'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.kategori.create');
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
            'nama_kategori' => 'required',
        ],[
            'nama_kategori.required' => 'Nama Kategori Wajib Diisi !'
        ]);

        Kategori::create($validatedData);
        Alert::success('Data Kategori', 'Berhasil Ditambahkan !');
        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('data.kategori.edit', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required',
        ],[
            'nama_kategori.required' => 'Nama Kategori Wajib Diisi !'
        ]);

        Kategori::where('id', $kategori->id)->update($validatedData);
        Alert::success('Data Kategori', 'Berhasil Diubah !');
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        Kategori::destroy($kategori->id);
        Alert::success('Data Kategori','Berhasil Dihapus !');
        return redirect()->route('kategori.index');
    }
}
