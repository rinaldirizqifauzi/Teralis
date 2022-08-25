<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporankaryawan extends Model
{
    use HasFactory;

    protected $fillable = ['id_pemesanan', 'id_anggota', 'hargaukuran','rangeukuran','panjang','lebar','tgl_lokasi', 'id_ukuran'];


    public function ukuranbesis(){
        return $this->belongsTo(Karyawan::class, 'id_anggota');
    }

    public function anggotas(){
        return $this->belongsTo(Karyawan::class, 'id_anggota');
    }


    public function pemesanans(){
        return $this->belongsTo(Pemesanan::class, 'id_pemesanan');
    }
}
