<?php

namespace App\Http\Controllers;

use App\Models\Motif;
use App\Models\Posting;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostingController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:Tampil Data Posting',['only' => 'index']);
        $this->middleware('permission:Buat Data Posting',['only' => 'create','store']);
        $this->middleware('permission:Ubah Data Posting,',['only' => 'edit','update']);
        $this->middleware('permission:Hapus Data Posting',['only' => 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $postings = Posting::where('nama_posting','LIKE','%'.$request->search. '%')->paginate(1);
        }else{
            $postings = Posting::paginate(1);
        }
       return view('data.post.index', compact('postings'));
    }

    public function selectKategori(Request $request)
    {
        $kategori = Kategori::select('id', 'nama_kategori')->limit(5);
        if ($request->has('q')) {
            $kategori->where('nama_kategori', 'LIKE', "%{$request->q}%");
        }

        return response()->json($kategori->get());
    }

    public function selectMotif(Request $request)
    {
        $motif = Motif::select('id', 'nama_motif')->limit(5);
        if ($request->has('q')) {
            $motif->where('nama_motif', 'LIKE', "%{$request->q}%");
        }

        return response()->json($motif->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.post.create',[
            'kategoris' => Kategori::all(),
            'motifs' => Motif::all(),
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
            'nama_posting' => 'required',
            'id_motif' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required'
        ]);

        Posting::create($validatedData);

        return redirect()->route('posting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function show(Posting $posting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function edit(Posting $posting)
    {
        return view('data.post.edit', [
            'posting' => $posting,
            'motifs' => Motif::all(),
            'kategoris' => Kategori::all(),
            'motifSelected' => $posting->first(),
            'kategoriSelected' => $posting->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posting $posting)
    {
        $rules = [
            'nama_posting' => 'required',
            'id_motif' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required'
        ];


        $validatedData = $request->validate($rules);


        Posting::where('id', $posting->id)->update($validatedData);
        return redirect()->route('posting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posting  $posting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posting $posting)
    {
        Posting::destroy($posting->id);
        return redirect()->route('posting.index');

    }
}
