<?php

namespace App\Http\Controllers;

use App\Models\Jenisbesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class JenisbesiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Jenis Besi',['only' => 'index']);
        $this->middleware('permission:Buat Data Jenis Besi',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Jenis Besi,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Jenis Besi',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $jenisbesis = Jenisbesi::where('jenis_besi','LIKE','%'.$request->search. '%')->paginate(3);
        }else{
            $jenisbesis = Jenisbesi::paginate(3);
        }
        return view('data.jenis_besi.index',compact('jenisbesis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.jenis_besi.create');
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
            'jenis_besi' => 'required',
            'image_jenis_besi' => 'required|image|file|max:1024',
            'harga' => 'required',
        ],[
            'jenis_besi.required' => 'Jenis Besi Wajib Diisi !!',
            'image_jenis_besi.required' => 'Gambar Jenis Besi Wajib Diisi !!',
            'image_jenis_besi.max:1024' => 'Gambar Jenis Besi Maksimal (1024 Kb)',
            'harga.required' => 'Harga Wajib Diisi',
        ]);

        if ($request->file('image_jenis_besi')) {
            $validatedData['image_jenis_besi'] = $request->file('image_jenis_besi')->store('post-image_jenis_besis');
        }

        Jenisbesi::create($validatedData);
        Alert::success('Data Jenis Besi','Berhasil Ditambahkan !');
        return redirect()->route('jenisbesi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenisbesi  $jenisbesi
     * @return \Illuminate\Http\Response
     */
    public function show(Jenisbesi $jenisbesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenisbesi  $jenisbesi
     * @return \Illuminate\Http\Response
     */
    public function edit(Jenisbesi $jenisbesi)
    {
        return view('data.jenis_besi.edit', [
            'jenisbesi' => $jenisbesi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenisbesi  $jenisbesi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jenisbesi $jenisbesi)
    {
        $validatedData = $request->validate([
            'jenis_besi' => 'required',
            'image_jenis_besi' => 'image|file|max:1024',
            'harga' => 'required',
        ],[
            'jenis_besi.required' => 'Jenis Besi Wajib Diisi !!',
            'image_jenis_besi.max:1024' => 'Gambar Jenis Besi Maksimal (1024 Kb)',
            'harga.required' => 'Harga Wajib Diisi',
        ]);


        if ($request->file('image_jenis_besi')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image_jenis_besi'] = $request->file('image_jenis_besi')->store('post-image_jenis_besis');
        }

        Jenisbesi::where('id', $jenisbesi->id)->update($validatedData);
        Alert::success('Data Jenis Besi','Berhasil Diubah !');
        return redirect()->route('jenisbesi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenisbesi  $jenisbesi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jenisbesi $jenisbesi)
    {
        if($jenisbesi->image_jenis_besi){
            Storage::delete($jenisbesi->image_jenis_besi);
        }

        Jenisbesi::destroy($jenisbesi->id);
        Alert::success('Data Jenis Besi','Berhasil Dihapus !');
        return redirect()->route('jenisbesi.index');
    }
}
