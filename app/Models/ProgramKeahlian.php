<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    protected $table = 'program_keahlians';

    protected $fillable = [
        'nama',
        'singkatan',
        'deskripsi',
        'logo',
    ];
}