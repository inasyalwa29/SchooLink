<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();

            // Identitas Sekolah
            $table->string('nama_sekolah');
            $table->string('nama_singkat')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon', 50)->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            // Informasi Sekolah
            $table->text('deskripsi')->nullable();
            $table->string('nama_panggilan')->nullable();
            $table->string('akreditasi', 10)->nullable();

            // Nilai Sekolah
            $table->string('nilai_1')->nullable();
            $table->string('nilai_2')->nullable();
            $table->string('nilai_3')->nullable();
            $table->string('nilai_4')->nullable();

            // Motto
            $table->string('motto')->nullable();
            $table->text('penjelasan_motto')->nullable();

            // Kepala Sekolah
            $table->string('nama_kepala_sekolah')->nullable();
            $table->string('jabatan_kepala_sekolah')->nullable();
            $table->text('sambutan_kepala_sekolah')->nullable();
            $table->string('foto_kepala_sekolah')->nullable();

            // Logo Sekolah
            $table->string('logo_sekolah')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};