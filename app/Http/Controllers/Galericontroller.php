<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    // ==========================================
    // HALAMAN PUBLIK
    // ==========================================
    public function indexPublic()
    {
        $galeri = Galeri::latest()->get();

        return view('galeri', compact('galeri'));
    }


    // ==========================================
    // HALAMAN ADMIN
    // ==========================================
    public function index()
    {
        // Ambil semua data galeri
        $galeri = Galeri::latest()->get();

        // Ambil semua data berita
        $berita = Berita::latest()->get();

        // Kirim galeri dan berita ke halaman admin
        return view(
            'admin.galeri.index',
            compact('galeri', 'berita')
        );
    }


    // ==========================================
    // TAMBAH DATA GALERI
    // ==========================================
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Folder upload
        $folderUpload = public_path('uploads');

        // Buat folder jika belum ada
        if (!File::exists($folderUpload)) {
            File::makeDirectory($folderUpload, 0755, true);
        }

        // Nama file foto
        $namaFoto =
            time() .
            '_' .
            uniqid() .
            '.' .
            $request->foto->extension();

        // Upload foto
        $request->foto->move(
            $folderUpload,
            $namaFoto
        );

        // Simpan ke database
        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'gambar' => $namaFoto,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Foto galeri berhasil ditambahkan!'
            );
    }


    // ==========================================
    // HALAMAN EDIT GALERI
    // ==========================================
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view(
            'admin.galeri.edit',
            compact('galeri')
        );
    }


    // ==========================================
    // UPDATE DATA GALERI
    // ==========================================
    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update judul
        $galeri->judul = $request->judul;

        // Update keterangan
        $galeri->keterangan = $request->keterangan;


        // ==========================================
        // JIKA MENGGANTI FOTO
        // ==========================================
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if (!empty($galeri->gambar)) {

                $fotoLama = public_path(
                    'uploads/' . $galeri->gambar
                );

                if (File::exists($fotoLama)) {
                    File::delete($fotoLama);
                }
            }


            // Pastikan folder uploads ada
            $folderUpload = public_path('uploads');

            if (!File::exists($folderUpload)) {
                File::makeDirectory(
                    $folderUpload,
                    0755,
                    true
                );
            }


            // Nama foto baru
            $namaFotoBaru =
                time() .
                '_' .
                uniqid() .
                '.' .
                $request->foto->extension();


            // Upload foto baru
            $request->foto->move(
                $folderUpload,
                $namaFotoBaru
            );


            // Simpan nama foto baru
            $galeri->gambar = $namaFotoBaru;
        }


        // Simpan perubahan
        $galeri->save();


        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Data galeri berhasil diperbarui!'
            );
    }


    // ==========================================
    // HAPUS DATA GALERI
    // ==========================================
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);


        // Hapus file gambar
        if (!empty($galeri->gambar)) {

            $fileGambar = public_path(
                'uploads/' . $galeri->gambar
            );

            if (File::exists($fileGambar)) {
                File::delete($fileGambar);
            }
        }


        // Hapus data dari database
        $galeri->delete();


        return redirect()
            ->route('admin.galeri.index')
            ->with(
                'success',
                'Data galeri berhasil dihapus!'
            );
    }
}