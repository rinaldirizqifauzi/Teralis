<?php

use App\Http\Controllers\Auth\LoginController;
use Carbon\Carbon;
use App\Models\Posting;
use App\Models\Karyawan;
use App\Models\Pemesanan;
use App\Models\Laporankaryawan;
use App\Http\Controllers\BesiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisbesiController;
use App\Http\Controllers\UkuranbesiController;
use App\Http\Controllers\LaporankaryawanController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes Tes coba l ubah dek nih satu lagi
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard/laporan/karyawan', function () {
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = Laporankaryawan::whereBetween('created_at',[$start_date,$end_date])->get();
    } else {
        $data = Laporankaryawan::latest()->get();
    }
    return view('report.karyawan', compact('data'));
})->name('report.karyawan');

Route::get('/dashboard/laporan/pemesanan', function () {
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = Pemesanan::whereBetween('created_at',[$start_date,$end_date])->get();
        $sumpemesanans = Pemesanan::whereBetween('created_at',[$start_date,$end_date])->sum('harga');
        $jumpemesanans = Pemesanan::whereBetween('created_at',[$start_date,$end_date])->count();
    } else {
        $sumpemesanans = DB::table("pemesanans")->sum('harga');
        $jumpemesanans = Pemesanan::count();
        $data = Pemesanan::latest()->get();
    }
    return view('report.pemesanan', compact('data','sumpemesanans','jumpemesanans'));
})->name('report.pemesanan');

Route::get('/dashboard/laporan/anggota', function () {
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = Karyawan::whereBetween('created_at',[$start_date,$end_date])->get();
    } else {
        $data = Karyawan::latest()->get();
    }
    return view('report.anggota', compact('data'));
})->name('report.anggota');

Route::get('/dashboard/laporan/posting', function () {
    if (request()->start_date || request()->end_date) {
        $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
        $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
        $data = Posting::whereBetween('created_at',[$start_date,$end_date])->get();
        $jumposting = Pemesanan::whereBetween('created_at',[$start_date,$end_date])->count();
    } else {
        $data = Posting::latest()->get();
        $jumposting = Posting::count();
    }
    return view('report.posting', compact('data','jumposting'));
})->name('report.posting');

// Hubungi Admin
Route::post('/kirim', function () {
    $id_pemesanan = $_POST['id_pemesanan'];
    $nama = $_POST['nama'];

    return redirect('https://api.whatsapp.com/send?phone=6285263884971/&text=ID%20Pemesanan%20'.$id_pemesanan.'%20Nama%20'.$nama.'');
});

    Route::get('/', [\App\Http\Controllers\PostController::class,'started'])->name('started');


    Route::get('/loginpengguna', [PenggunaController::class, 'login'])->name('loginpengguna')->middleware('guest');
    Route::post('/postlogin', [PenggunaController::class,'postlogin'])->name('postlogin');

    // Register Pengguna
    Route::get('/registerpengguna', [PenggunaController::class, 'register'])->name('registerpengguna');
    Route::post('/registerpengguna', [PenggunaController::class, 'storeregister'])->name('registerpengguna.store');
    // Logout Pengguna
    Route::get('/logoutpengguna', [PenggunaController::class,'logout'])->name('penggunalogout');


    Route::group(['middleware' => ['auth:pengguna', 'ceklevel:pengguna']], function(){
        // Blog
        Route::get('/beranda',[PostController::class,'home'])->name('blog.home');
        Route::get('/jenisbesi',[PostController::class,'jenisbesi'])->name('blog.jenisbesi');
        Route::get('/categories/{id}',[PostController::class,'showPostsByCategory'])->name('blog.post.category');
        Route::get('/spesifikasi/{id}',[PostController::class,'showPostDetail'])->name('blog.post.detail');
        Route::get('/form-pemesanan/{id}',[PostController::class,'showPostCheckout'])->name('blog.post.checkout');
        Route::get('/form-lokasi-pemesanan/{kode_pemesanan}',[PostController::class,'showPostPembayaran'])->name('blog.post.pembayaran');
        Route::get('/struck-pemesanan/',[PostController::class,'showPostStruck'])->name('blog.post.struck');
        Route::get('/kode-pemesanan',[PostController::class,'showPostSearch'])->name('blog.post.search');
        Route::get('/data-pemesanan',[PostController::class,'showPostTransaction'])->name('blog.post.transaksi');
        Route::post('/data-pemesanan/update/{id}', [PostController::class, 'update'])->name('blog.post.update.transaksi');
        Route::post('/getkabupaten', [PostController::class,'getkabupaten'])->name('getkabupaten');
        Route::post('/getkecamatan', [PostController::class,'getkecamatan'])->name('getkecamatan');
        Route::post('/getdesa', [PostController::class,'getdesa'])->name('getdesa');
    });


  // Admin
  Route::group(['prefix' => '/dashboard'], function(){
    Route::resource('/motif', MotifController::class);
    Route::resource('/kategori', KategoriController::class);
    Route::resource('/posting', PostingController::class);
    Route::resource('/besi', BesiController::class);
    Route::resource('/lokasi', LokasiController::class);
    Route::resource('/jenisbesi', JenisbesiController::class);
    Route::resource('/ukuranbesi', UkuranbesiController::class);
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/laporan-karyawan', LaporankaryawanController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/users', UserController::class)->except('show');

    //Select > Dashboard
    Route::get('/select/ukuranbesi', [BesiController::class, 'selectUkuranBesi'])->name('ukuranbesi.select');
    Route::get('/select/jenisbesi', [BesiController::class, 'selectJenisBesi'])->name('jenisbesi.select');
    Route::get('/select/kategori', [PostingController::class, 'selectKategori'])->name('kategori.select');
    Route::get('/select/motif', [PostingController::class, 'selectMotif'])->name('motif.select');
    Route::get('/pemesanan/select/lokasi', [PostController::class, 'selectLokasi'])->name('lokasi.select');
    Route::get('/select/anggota', [LaporanKaryawanController::class, 'selectAnggota'])->name('anggota.select');
    Route::get('/select/pemesanan', [LaporanKaryawanController::class, 'selectPemesanan'])->name('pemesanan.select');
    Route::get('/select/roles', [UserController::class, 'selectRole'])->name('roles.select');
    Route::get('/select/lokasi/checkout', [PostController::class, 'selectLokasi'])->name('lokasi.select.checkout');
    Route::get('/select/besi/checkout', [PostController::class, 'selectBesi'])->name('besi.select.checkout');

    // Data Pemesanan
    Route::post('/pemesanan/insert', [PostController::class, 'insert'])->name('pemesanan.insert');
    Route::post('/pemesanan/update/{id}', [LaporanController::class, 'update'])->name('pemesanan.update');

    // Laporan Anggota
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/struck/{id_pemesanan}', [LaporanController::class, 'struck'])->name('laporan.struck');
    Route::get('/laporan/{id}', [LaporanController::class, 'edit'])->name('laporan.edit');

    // Report
    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
});

Auth::routes();

