<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class KaryawanController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:Tampil Data Karyawan',['only' => 'index']);
        $this->middleware('permission:Buat Data Karyawan',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Karyawan,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Karyawan',['only' => 'destroy']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('search')) {
            $anggotas = Karyawan::where('nama_anggota','LIKE','%'.$request->search. '%')->paginate(3);
        }else{
            $anggotas = Karyawan::paginate(6);
        }

        return view('data.anggota.index',compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.anggota.create');
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
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
            'image_ktp' => 'required'
        ],[
            'nama_anggota.required' => 'Nama Anggota wajib diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi!',
            'nohp.required' => 'Nomor Handphone / Wa wajib diisi!',
            'alamat.required' => 'Alamat wajib diisi!',
            'image_ktp.required' => 'Foto wajib diisi!',
        ]);

        if ($request->file('image_ktp')) {
            $validatedData['image_ktp'] = $request->file('image_ktp')->store('post-image_ktp');
        }

        Karyawan::create($validatedData);
        Alert::success('Data Anggota', 'Berhasil Ditambahkan!');
        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    // public function show(Karyawan $karyawan)
    // {
    //     $karyawan = Karyawan::find($id);
    //     return view('data.anggota.index',compact('karyawan'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('data.anggota.edit',[
            'karyawan' => $karyawan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $rules = [
            'nama_anggota' => 'required',
            'jenis_kelamin' => 'required',
            'nohp' => 'required',
            'alamat' => 'required',
        ];

        $validatedData = $request->validate($rules);

          if ($request->file('image_ktp')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image_ktp'] = $request->file('image_ktp')->store('post-image_ktp');
        }

        Karyawan::where('id', $karyawan->id)->update($validatedData);
        Alert::success('Data Anggota', 'Berhasil Diubah!');
        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        if($karyawan->image_ktp){
            Storage::delete($karyawan->image_ktp);
        }

        Karyawan::destroy($karyawan->id);
        Alert::success('Data Anggota', 'Berhasil Dihapus!');
        return redirect()->route('karyawan.index');
    }
}
