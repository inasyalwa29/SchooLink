<?php

namespace App\Http\Controllers;

use App\Models\ProgramKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProgramKeahlianController extends Controller
{
    /**
     * Menampilkan daftar program keahlian.
     */
    public function index()
    {
        $programKeahlians = ProgramKeahlian::latest()->get();

        return redirect()
            ->route('admin.profil.index')
            ->with('programKeahlians', $programKeahlians);
    }

    /**
     * Menyimpan program keahlian baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama.required' => 'Nama program keahlian wajib diisi.',
            'singkatan.required' => 'Singkatan program keahlian wajib diisi.',
            'logo.image' => 'File logo harus berupa gambar.',
            'logo.mimes' => 'Format logo harus JPG, JPEG, PNG, atau WEBP.',
            'logo.max' => 'Ukuran logo maksimal 2 MB.',
        ]);

        $data = [
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('logo')) {

            $folderUpload = public_path(
                'uploads/program-keahlian'
            );

            if (!File::exists($folderUpload)) {
                File::makeDirectory(
                    $folderUpload,
                    0755,
                    true
                );
            }

            $logo = $request->file('logo');

            $namaLogo =
                time() .
                '_' .
                uniqid() .
                '.' .
                $logo->extension();

            $logo->move(
                $folderUpload,
                $namaLogo
            );

            $data['logo'] = $namaLogo;
        }

        ProgramKeahlian::create($data);

        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Program keahlian berhasil ditambahkan.'
            );
    }

    /**
     * Memperbarui program keahlian.
     */
    public function update(
        Request $request,
        $id
    ) {
        $programKeahlian =
            ProgramKeahlian::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'required|string|max:20',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama.required' =>
                'Nama program keahlian wajib diisi.',

            'singkatan.required' =>
                'Singkatan program keahlian wajib diisi.',

            'logo.image' =>
                'File logo harus berupa gambar.',

            'logo.mimes' =>
                'Format logo harus JPG, JPEG, PNG, atau WEBP.',

            'logo.max' =>
                'Ukuran logo maksimal 2 MB.',
        ]);

        $data = [
            'nama' => $request->nama,
            'singkatan' => $request->singkatan,
            'deskripsi' => $request->deskripsi,
        ];

        /*
        |--------------------------------------------------------------------------
        | GANTI LOGO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {

            /*
            | Hapus logo lama
            */

            if (!empty($programKeahlian->logo)) {

                $logoLama = public_path(
                    'uploads/program-keahlian/' .
                    $programKeahlian->logo
                );

                if (File::exists($logoLama)) {
                    File::delete($logoLama);
                }
            }


            /*
            | Pastikan folder tersedia
            */

            $folderUpload = public_path(
                'uploads/program-keahlian'
            );

            if (!File::exists($folderUpload)) {

                File::makeDirectory(
                    $folderUpload,
                    0755,
                    true
                );
            }


            /*
            | Simpan logo baru
            */

            $logo = $request->file('logo');

            $namaLogo =
                time() .
                '_' .
                uniqid() .
                '.' .
                $logo->extension();

            $logo->move(
                $folderUpload,
                $namaLogo
            );

            $data['logo'] = $namaLogo;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $programKeahlian->update($data);


        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Program keahlian berhasil diperbarui.'
            );
    }

    /**
     * Menghapus program keahlian.
     */
    public function destroy($id)
    {
        $programKeahlian =
            ProgramKeahlian::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | HAPUS LOGO
        |--------------------------------------------------------------------------
        */

        if (!empty($programKeahlian->logo)) {

            $fileLogo = public_path(
                'uploads/program-keahlian/' .
                $programKeahlian->logo
            );

            if (File::exists($fileLogo)) {
                File::delete($fileLogo);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS DATA
        |--------------------------------------------------------------------------
        */

        $programKeahlian->delete();


        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Program keahlian berhasil dihapus.'
            );
    }
}