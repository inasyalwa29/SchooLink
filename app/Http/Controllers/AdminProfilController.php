<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\ProgramKeahlian;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProfilController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PROFIL
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $schoolProfile = SchoolProfile::first();

        $ekstrakurikulers = Ekstrakurikuler::latest()->get();

        $programKeahlians = ProgramKeahlian::latest()->get();

        return view(
            'admin.profil.index',
            compact(
                'schoolProfile',
                'ekstrakurikulers',
                'programKeahlians'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFIL SEKOLAH
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_sekolah' => [
                'required',
                'string',
                'max:255',
            ],

            'nama_singkat' => [
                'nullable',
                'string',
                'max:255',
            ],

            'alamat' => [
                'nullable',
                'string',
            ],

            'telepon' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'website' => [
                'nullable',
                'string',
                'max:255',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'nama_panggilan' => [
                'nullable',
                'string',
                'max:255',
            ],

            'akreditasi' => [
                'nullable',
                'string',
                'max:10',
            ],

            'nilai_1' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nilai_2' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nilai_3' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nilai_4' => [
                'nullable',
                'string',
                'max:255',
            ],

            'nama_kepala_sekolah' => [
                'nullable',
                'string',
                'max:255',
            ],

            'jabatan_kepala_sekolah' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sambutan_kepala_sekolah' => [
                'nullable',
                'string',
            ],

            'logo_sekolah' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'foto_kepala_sekolah' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        $schoolProfile = SchoolProfile::first();

        if (!$schoolProfile) {
            $schoolProfile = new SchoolProfile();
        }


        $schoolProfile->nama_sekolah =
            $validated['nama_sekolah'];

        $schoolProfile->nama_singkat =
            $validated['nama_singkat'] ?? null;

        $schoolProfile->alamat =
            $validated['alamat'] ?? null;

        $schoolProfile->telepon =
            $validated['telepon'] ?? null;

        $schoolProfile->email =
            $validated['email'] ?? null;

        $schoolProfile->website =
            $validated['website'] ?? null;

        $schoolProfile->deskripsi =
            $validated['deskripsi'] ?? null;

        $schoolProfile->nama_panggilan =
            $validated['nama_panggilan'] ?? null;

        $schoolProfile->akreditasi =
            $validated['akreditasi'] ?? null;

        $schoolProfile->nilai_1 =
            $validated['nilai_1'] ?? null;

        $schoolProfile->nilai_2 =
            $validated['nilai_2'] ?? null;

        $schoolProfile->nilai_3 =
            $validated['nilai_3'] ?? null;

        $schoolProfile->nilai_4 =
            $validated['nilai_4'] ?? null;

        $schoolProfile->nama_kepala_sekolah =
            $validated['nama_kepala_sekolah'] ?? null;

        $schoolProfile->jabatan_kepala_sekolah =
            $validated['jabatan_kepala_sekolah'] ?? null;

        $schoolProfile->sambutan_kepala_sekolah =
            $validated['sambutan_kepala_sekolah'] ?? null;


        /*
        |--------------------------------------------------------------------------
        | FOLDER UPLOAD
        |--------------------------------------------------------------------------
        */

        $folder = public_path('uploads/sekolah');

        if (!File::exists($folder)) {
            File::makeDirectory(
                $folder,
                0755,
                true
            );
        }


        /*
        |--------------------------------------------------------------------------
        | LOGO SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo_sekolah')) {

            if (
                $schoolProfile->logo_sekolah &&
                File::exists(
                    $folder . '/' .
                    $schoolProfile->logo_sekolah
                )
            ) {
                File::delete(
                    $folder . '/' .
                    $schoolProfile->logo_sekolah
                );
            }

            $file =
                $request->file('logo_sekolah');

            $filename =
                'logo-sekolah-' .
                time() .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $filename
            );

            $schoolProfile->logo_sekolah =
                $filename;
        }


        /*
        |--------------------------------------------------------------------------
        | FOTO KEPALA SEKOLAH
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('foto_kepala_sekolah')) {

            if (
                $schoolProfile->foto_kepala_sekolah &&
                File::exists(
                    $folder . '/' .
                    $schoolProfile->foto_kepala_sekolah
                )
            ) {
                File::delete(
                    $folder . '/' .
                    $schoolProfile->foto_kepala_sekolah
                );
            }

            $file =
                $request->file(
                    'foto_kepala_sekolah'
                );

            $filename =
                'kepala-sekolah-' .
                time() .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $filename
            );

            $schoolProfile->foto_kepala_sekolah =
                $filename;
        }


        $schoolProfile->save();


        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Profil sekolah berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PROGRAM KEAHLIAN - TAMBAH
    |--------------------------------------------------------------------------
    */

    public function storeProgramKeahlian(Request $request)
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'singkatan' => [
                'required',
                'string',
                'max:50',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        $programKeahlian = new ProgramKeahlian();

        $programKeahlian->nama =
            $validated['nama'];

        $programKeahlian->singkatan =
            $validated['singkatan'];

        $programKeahlian->deskripsi =
            $validated['deskripsi'] ?? null;


        /*
        |--------------------------------------------------------------------------
        | UPLOAD LOGO
        |--------------------------------------------------------------------------
        */

        $folder =
            public_path(
                'uploads/program-keahlian'
            );

        if (!File::exists($folder)) {
            File::makeDirectory(
                $folder,
                0755,
                true
            );
        }


        if ($request->hasFile('logo')) {

            $file =
                $request->file('logo');

            $filename =
                'program-' .
                time() .
                '-' .
                uniqid() .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $filename
            );

            $programKeahlian->logo =
                $filename;
        }


        $programKeahlian->save();


        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Program keahlian berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PROGRAM KEAHLIAN - UPDATE
    |--------------------------------------------------------------------------
    */

    public function updateProgramKeahlian(
        Request $request,
        $id
    ) {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
            ],

            'singkatan' => [
                'required',
                'string',
                'max:50',
            ],

            'deskripsi' => [
                'nullable',
                'string',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],
        ]);


        $programKeahlian =
            ProgramKeahlian::findOrFail($id);


        $programKeahlian->nama =
            $validated['nama'];

        $programKeahlian->singkatan =
            $validated['singkatan'];

        $programKeahlian->deskripsi =
            $validated['deskripsi'] ?? null;


        /*
        |--------------------------------------------------------------------------
        | UPLOAD LOGO BARU
        |--------------------------------------------------------------------------
        */

        $folder =
            public_path(
                'uploads/program-keahlian'
            );

        if (!File::exists($folder)) {
            File::makeDirectory(
                $folder,
                0755,
                true
            );
        }


        if ($request->hasFile('logo')) {

            if (
                $programKeahlian->logo &&
                File::exists(
                    $folder . '/' .
                    $programKeahlian->logo
                )
            ) {
                File::delete(
                    $folder . '/' .
                    $programKeahlian->logo
                );
            }


            $file =
                $request->file('logo');

            $filename =
                'program-' .
                time() .
                '-' .
                uniqid() .
                '.' .
                $file->getClientOriginalExtension();

            $file->move(
                $folder,
                $filename
            );

            $programKeahlian->logo =
                $filename;
        }


        $programKeahlian->save();


        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Program keahlian berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | PROGRAM KEAHLIAN - HAPUS
    |--------------------------------------------------------------------------
    */

    public function destroyProgramKeahlian($id)
    {
        $programKeahlian =
            ProgramKeahlian::findOrFail($id);


        /*
        | Hapus file logo
        */

        if ($programKeahlian->logo) {

            $path =
                public_path(
                    'uploads/program-keahlian/' .
                    $programKeahlian->logo
                );

            if (File::exists($path)) {
                File::delete($path);
            }
        }


        $programKeahlian->delete();


        return redirect()
            ->route('admin.profil.index')
            ->with(
                'success',
                'Program keahlian berhasil dihapus.'
            );
    }
}