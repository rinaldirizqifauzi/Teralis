<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    use HasFactory;

    protected $fillable = [
       'nama_posting','id_motif' ,'id_kategori' ,'stok', 'deskripsi'
    ];

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function id_motifs(){
        return $this->belongsTo(Motif::class, 'id_motif');
    }

    public function id_kategoris(){
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
