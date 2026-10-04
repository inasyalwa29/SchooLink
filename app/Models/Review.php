<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'rating',
        'komentar',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}