<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama','id_pemesanan','detail_lokasi','id_besi',
        'nama_motif','harga_motif', 'jumlah', 'harga',
        'kode_pemesanan','provinsi','kabupaten','kecamatan',
        'desa','status'
    ];

    public function id_provinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi');
    }

    public function id_kabupaten()
    {
        return $this->belongsTo(Regency::class, 'kabupaten');
    }

    public function id_kecamatan()
    {
        return $this->belongsTo(District::class, 'kecamatan');
    }

    public function id_desa()
    {
        return $this->belongsTo(Village::class, 'desa');
    }

    public function laporankaryawans(){
        return $this->hasMany(Laporankaryawan::class);
    }

    public function id_besis(){
        return $this->belongsTo(Besi::class, 'id_besi');
    }
}
