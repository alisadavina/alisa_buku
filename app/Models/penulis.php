<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    protected $primaryKey = 'id_penulis'; // Tentukan nama kolom primary key yang digunakan

    protected $fillable = [
        'id_penulis',
        'nama_penulis',
        'tanggal_lahir',
        'email',
        'alamat',
    ];

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'id_penulis', 'id_penulis');
    }
}
