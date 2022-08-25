<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukuranbesi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_ukuran', 'range','harga'];

    public function besi(){
        return $this->hasMany(Besi::class);
    }

    public function laporankaryawan(){
        return $this->hasMany(Laporankaryawan::class);
    }
}
