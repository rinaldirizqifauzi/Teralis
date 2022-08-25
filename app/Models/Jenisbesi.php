<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenisbesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_besi','image_jenis_besi','harga'
    ];

    public function besi(){
        return $this->hasMany(Besi::class);
    }
}
