<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'tanggal',
        'kategori',
        'ringkasan',
        'isi',
        'gambar',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}