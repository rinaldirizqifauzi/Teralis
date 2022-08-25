<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporankaryawan;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Tampil Data Laporan',['only' => 'index']);
    }

    public function index(){
        return view('data.report.index',[
            'laporankaryawans' =>  Laporankaryawan::all(),
        ]);
    }
}
