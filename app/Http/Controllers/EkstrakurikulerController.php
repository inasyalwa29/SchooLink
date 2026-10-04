<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EkstrakurikulerController extends Controller
{
    /**
     * Tambah ekstrakurikuler
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'ikon' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'status' => 'nullable|boolean',
        ], [
            'nama.required' => 'Nama ekstrakurikuler wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 10 MB.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA EKSTRAKURIKULER
        |--------------------------------------------------------------------------
        */

        $data = [
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'ikon' => $validated['ikon'] ?? null,

            // Kalau status tidak dikirim dari form,
            // otomatis dibuat aktif.
            'status' => $validated['status'] ?? true,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPLOAD GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            $folderUpload = public_path('uploads/ekstrakurikuler');

            if (!File::exists($folderUpload)) {
                File::makeDirectory(
                    $folderUpload,
                    0755,
                    true
                );
            }

            $gambar = $request->file('gambar');

            /*
            |--------------------------------------------------------------------------
            | Simpan nama file unik
            |--------------------------------------------------------------------------
            */

            $namaGambar =
                time() .
                '_' .
                uniqid() .
                '.' .
                $gambar->extension();

            /*
            |--------------------------------------------------------------------------
            | Pindahkan gambar ke:
            | public/uploads/ekstrakurikuler
            |--------------------------------------------------------------------------
            */

            $gambar->move(
                $folderUpload,
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN KE DATABASE
        |--------------------------------------------------------------------------
        */

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Ekstrakurikuler berhasil ditambahkan.'
            );
    }


    /**
     * Edit ekstrakurikuler
     */
    public function update(Request $request, $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'ikon' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
            'status' => 'nullable|boolean',
        ], [
            'nama.required' => 'Nama ekstrakurikuler wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 10 MB.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA YANG DIPERBARUI
        |--------------------------------------------------------------------------
        */

        $data = [
            'nama' => $validated['nama'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'ikon' => $validated['ikon'] ?? null,
        ];

        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        |
        | Kalau form mengirim status, gunakan status tersebut.
        | Kalau tidak, pertahankan status yang sudah ada.
        |
        */

        if (isset($validated['status'])) {
            $data['status'] = $validated['status'];
        }

        /*
        |--------------------------------------------------------------------------
        | GANTI GAMBAR
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gambar')) {

            /*
            |--------------------------------------------------------------------------
            | Hapus gambar lama
            |--------------------------------------------------------------------------
            */

            if (!empty($ekstrakurikuler->gambar)) {

                $gambarLama = public_path(
                    'uploads/ekstrakurikuler/' .
                    $ekstrakurikuler->gambar
                );

                if (File::exists($gambarLama)) {
                    File::delete($gambarLama);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Pastikan folder upload tersedia
            |--------------------------------------------------------------------------
            */

            $folderUpload = public_path(
                'uploads/ekstrakurikuler'
            );

            if (!File::exists($folderUpload)) {
                File::makeDirectory(
                    $folderUpload,
                    0755,
                    true
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Ambil gambar baru
            |--------------------------------------------------------------------------
            */

            $gambar = $request->file('gambar');

            $namaGambar =
                time() .
                '_' .
                uniqid() .
                '.' .
                $gambar->extension();

            /*
            |--------------------------------------------------------------------------
            | Simpan gambar baru
            |--------------------------------------------------------------------------
            */

            $gambar->move(
                $folderUpload,
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE DATABASE
        |--------------------------------------------------------------------------
        */

        $ekstrakurikuler->update($data);

        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Ekstrakurikuler berhasil diperbarui.'
            );
    }


    /**
     * Ubah status ekstrakurikuler
     */
    public function toggleStatus($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $ekstrakurikuler->update([
            'status' => !$ekstrakurikuler->status,
        ]);

        $status = $ekstrakurikuler->status
            ? 'diaktifkan'
            : 'dinonaktifkan';

        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                "Ekstrakurikuler berhasil {$status}."
            );
    }


    /**
     * Hapus ekstrakurikuler
     */
    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Hapus gambar dari folder
        |--------------------------------------------------------------------------
        */

        if (!empty($ekstrakurikuler->gambar)) {

            $fileGambar = public_path(
                'uploads/ekstrakurikuler/' .
                $ekstrakurikuler->gambar
            );

            if (File::exists($fileGambar)) {
                File::delete($fileGambar);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Hapus data dari database
        |--------------------------------------------------------------------------
        */

        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Ekstrakurikuler berhasil dihapus.'
            );
    }
}