<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_anggota','jenis_kelamin','nohp','alamat','image_ktp'];

    public function laporankaryawans(){
        return $this->hasMany(Laporankaryawan::class);
    }

    public function pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }
}
