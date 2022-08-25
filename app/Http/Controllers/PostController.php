<?php

namespace App\Http\Controllers;

// use DB;
use App\Models\Besi;
use App\Models\Lokasi;
use App\Models\Posting;
use App\Models\Regency;
use App\Models\Village;
use App\Models\District;
use App\Models\Kategori;
use App\Models\Province;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function started()
    {
        return view('home');
    }

    public function home()
    {
        return view('post.index',[
            'posts' => Posting::latest()->get(),
            'kategoris' => Kategori::latest()->get(),
        ]);
    }
    public function jenisbesi()
    {
        return view('post.jenis-besi',[
            'jenisbesis' => Besi::latest()->get(),
        ]);
    }

    public function insert(Request $request ){
        $harga_motif  = $request->input('harga_motif');
        $harga_besi  = $request->input('harga');
        $jumlah  = $request->input('jumlah');
        $total = $harga_besi * $jumlah + $harga_motif;

         $request->validate([
            'nama' => 'required',
            'id_pemesanan' => 'required',
            'nama_motif' => 'required',
            'harga_motif' => 'required',
            'jumlah' => 'required',
            'harga' => 'required',
        ],[
            'nama.required' => 'Nama Wajib Diisi',
            'id_pemesanan.required' => 'Id Pemesanan Wajib Diisi',
            'id_besi.required' => 'Besi Wajib Diisi',
            'nama_motif.required' => 'Nama Motif Wajib Diisi',
            'harga_motif.required' => 'Harga Motif Wajib Diisi',
            'panjang.required' => 'Panjang Wajib Diisi',
            'lebar.required' => 'Lebar Wajib Diisi',
            'jumlah.required' => 'Jumlah Wajib Diisi',
            'harga.required' => 'Harga Wajib Diisi',
        ]);

        Pemesanan::create([
            'nama' => $request->nama,
            'id_pemesanan' => $request->id_pemesanan,
            'id_besi' => $request->id_besi,
            'nama_motif' => $request->nama_motif,
            'harga_motif' => $request->harga_motif,
            'panjang' => $request->panjang,
            'lebar' => $request->lebar,
            'jumlah' => $request->jumlah,
            'harga' => $total,
        ]);
        return redirect()->route('blog.post.search');
    }

    public function update(Request $request, $id)
    {
        $pemesanans = Pemesanan::find($id);

        $request->validate([
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
        ],[
            'provinsi.required' => 'Provinsi Wajib Diisi',
            'kabupaten.required' => 'Kabupaten Wajib Diisi',
            'kecamatan.required' => 'Kecamatan Wajib Diisi',
            'desa.required' => 'Desa Wajib Diisi',
        ]);

        $pemesanans->update([
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
        ]);
        return redirect()->route('blog.post.struck');
    }

    public function showPostsByCategory($id)
    {
        $posts = Posting::whereHas('kategoris', function ($query) use($id){
            return $query->where('id', $id);
        })->get();

        $category = Kategori::where('id', $id)->first();
        return view('post.category-posts',[
            'posts' => $posts,
            'category' => $category,
            'kategoris' =>  Kategori::get(),
        ]);
    }


    public function showPostDetail($id)
    {
        // Id Pemesanan
        $posting = Posting::where('id', $id)->first();

        return view('post.post-detail',[
            'posting' => $posting,
            'posts' => Posting::latest()->get(),

        ]);
    }


    public function showPostCheckout($id)
    {

        $lebar = Request()->input('lebar');
        $panjang = Request()->input('panjang');
        $total = $lebar * $panjang;


         // Id Pemesanan
         $posting = Posting::where('id', $id)->first();
         if (!$posting) {
             return redirect()->route('blog.home');
         }

         $q = DB::table('pemesanans')->select(DB::raw('MAX(RIGHT(id_pemesanan,4)) as kode'));

         $kd = "";

         if ($q->count()>0) {
             foreach ($q->get() as $k) {
                 $tmp = ((int)$k->kode)+1;
                 $kd = sprintf("%04s", $tmp);
             }
         }else {
             $kd = "0001";
         }

        return view('post.checkout',[
            'posting' => $posting,
            'kd' => $kd,
            'total' => $total,

            'besis' => Besi::all(),
            'lokasis' => Lokasi::all(),
       ]);
    }




    public function showPostSearch()
    {
        return view('post.search');
    }

    public function showPostTransaction(Request $request)
    {

        if ($request->has('search')) {
            $pemesanan = Pemesanan::where('kode_pemesanan','LIKE','%'.$request->search. '%')->get();
        }else{
            $pemesanan = Pemesanan::all();
         }
        return view('post.transaksi', [
            'pemesanan' => $pemesanan,
        ]);
    }

    public function showPostStruck(Request $request)
    {
        if ($request->has('search')) {
            $pemesanan = Pemesanan::where('kode_pemesanan','LIKE','%'.$request->search. '%')->get();
        }else{
            $pemesanan = Pemesanan::all();
         }
        return view('post.struck', [
            'pemesanan' => $pemesanan,
        ]);
    }


    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option>Pilih Kabupaten ....</option>";

        foreach($kabupatens as $kabupaten){
            $option.= "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option>Pilih Kecamatan ....</option>";

        foreach($kecamatans as $kecamatan){
            $option.= "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }

        echo $option;
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option>Pilih Desa ....</option>";

        foreach($desas as $desa){
            $option.= "<option value='$desa->id'>$desa->name</option>";
        }

        echo $option;
    }

    public function showPostPembayaran($id)
    {
        $pemesanans = Pemesanan::find($id);
        $pemesanan = Pemesanan::where('kode_pemesanan', $id)->first();
        return view('post.pembayaran', [
            'pemesanans' => $pemesanans,
            'pemesanans' => $pemesanan,
            'provinces' => Province::where('id', 13)->get(),

        ]);
    }
}
