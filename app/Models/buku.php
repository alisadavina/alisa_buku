<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $primaryKey = 'id_buku'; 

    protected $fillable = [
        'id_buku',
        'id_penulis',
        'foto_buku',
        'judul_buku',
        'tahun_terbit',
        'deskripsi',
        'harga',
        'stok',
    ];

    public function penulis()
    {
        return $this->belongsTo(penulis::class, 'id_penulis');
    }
}
