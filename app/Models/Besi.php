<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Besi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_besi','id_jenis_besi', 'id_ukuran_besi'
    ];

    public function jenisbesi(){
        return $this->belongsTo(JenisBesi::class, 'id_jenis_besi');
    }

    public function ukuranbesi(){
        return $this->belongsTo(Ukuranbesi::class, 'id_ukuran_besi');
    }

    public function pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }
}
