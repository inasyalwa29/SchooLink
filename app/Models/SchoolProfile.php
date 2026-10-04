<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    protected $table = 'school_profiles';

    protected $fillable = [
        // Identitas Sekolah
        'nama_sekolah',
        'nama_singkat',
        'alamat',
        'telepon',
        'email',
        'website',

        // Informasi Sekolah
        'deskripsi',
        'nama_panggilan',
        'akreditasi',

        // Nilai Sekolah
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'nilai_4',

        // Motto
        'motto',
        'penjelasan_motto',

        // Kepala Sekolah
        'nama_kepala_sekolah',
        'jabatan_kepala_sekolah',
        'sambutan_kepala_sekolah',
        'foto_kepala_sekolah',

        // Logo Sekolah
        'logo_sekolah',
    ];
}