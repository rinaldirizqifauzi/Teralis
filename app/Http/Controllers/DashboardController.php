<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use App\Models\Karyawan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use App\Models\Laporankaryawan;
use App\Models\Motif;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dashboard_show',['only' => 'started']);
        $this->middleware('permission:data',['only' => 'started']);
    }

    public function index()
    {

        $motifs = Motif::all();
        $anggota = Karyawan::count();
        $lap_posting = Posting::count();
        $lap_karyawan = Laporankaryawan::count();
        $lap_pemesanan = Pemesanan::count();
        $jmlpemesanans = Pemesanan::count();
        $pemesanans = Pemesanan::all();

        $bulan = Pemesanan::select(DB::raw("MONTHNAME(created_at) as bulan"))
                 ->GroupBy(DB::raw("MONTHNAME(created_at)"))->pluck('bulan');

        $pendapatan_per_bulan = Pemesanan::select(DB::raw("CAST(SUM(harga) as int) as harga"))
                 ->GroupBy(DB::raw("Month(created_at)"))->pluck('harga');

        $sumpemesanans = DB::table("pemesanans")->sum('harga');
        return view('dashboard.index',compact(
                    'lap_posting',
                    'lap_karyawan',
                    'bulan','pendapatan_per_bulan',
                    'jmlpemesanans','pemesanans','sumpemesanans','lap_pemesanan'));
    }
}
