<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motif extends Model
{
    use HasFactory;

    protected $fillable = ['nama_motif', 'image_motif', 'harga'];

    public function posting(){
        return $this->hasMany(Posting::class);
    }
}
