<?php

namespace App\Http\Controllers;

use App\Models\Motif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MotifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Tampil Data Motif',['only' => 'index']);
        $this->middleware('permission:Buat Data Motif',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Motif,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Motif',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $motifs = Motif::where('nama_motif','LIKE','%'.$request->search. '%')->paginate(3);
        }else{
            $motifs = Motif::paginate(4);
        }
        return view('data.motif.index', compact('motifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.motif.create');
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
            'nama_motif' => 'required',
            'image_motif' => 'required|image|file|max:1024',
            'harga' => 'required'
        ],[
            'nama_motif.required' => 'Nama Motif Wajib Diisi !',
            'image_motif.required' => 'Gambar Motif Wajib Diisi',
            'image_motif.max' => 'Gambar Motif Max (1024)',
            'harga.required' => 'Harga Wajib Diisi !'
        ]);
            if ($request->file('image_motif')) {
                $validatedData['image_motif'] = $request->file('image_motif')->store('post-image_motifs');
            }

        Motif::create($validatedData);
        Alert::success('Data Motif','Berhasil Ditambahkan !');
        return redirect()->route('motif.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function show(Motif $motif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function edit(Motif $motif)
    {
        return view('data.motif.edit',[
            'motif' => $motif,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Motif $motif)
    {
        $validatedData = $request->validate([
            'nama_motif' => 'required',
            'image_motif' => 'image|file|max:1024',
            'harga' => 'required'
        ],[
            'nama_motif.required' => 'Nama Motif Wajib Diisi !',
            'image_motif.max' => 'Gambar Motif Max (1024)',
            'harga.required' => 'Harga Wajib Diisi !'
        ]);

        if ($request->file('image_motif')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image_motif'] = $request->file('image_motif')->store('post-image_motifs');
        }

        Motif::where('id', $motif->id)->update($validatedData);
        Alert::success('Data Motif','Berhasil Diubah !');
        return redirect()->route('motif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motif  $motif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motif $motif)
    {
        if($motif->image_motif){
            Storage::delete($motif->image_motif);
        }

        Motif::destroy($motif->id);
        Alert::success('Data Motif','Berhasil Dihapus !');
        return redirect()->route('motif.index');

    }
}
