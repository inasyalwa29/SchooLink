<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAkunController extends Controller
{
    /**
     * Menampilkan halaman akun admin.
     */
    public function index()
    {
        $user = Auth::user();

        return view(
            'admin.akun.index',
            compact('user')
        );
    }


    /**
     * Memperbarui nama dan email akun admin.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
            ],
        ], [
            'name.required' =>
                'Nama lengkap wajib diisi.',

            'name.string' =>
                'Nama lengkap harus berupa teks.',

            'name.max' =>
                'Nama lengkap maksimal 255 karakter.',

            'email.required' =>
                'Email wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'email.max' =>
                'Email maksimal 255 karakter.',

            'email.unique' =>
                'Email tersebut sudah digunakan oleh pengguna lain.',
        ]);


        $user->name = $validated['name'];

        $user->email = $validated['email'];

        $user->save();


        return redirect()
            ->route('admin.akun.index')
            ->with(
                'success',
                'Informasi akun berhasil diperbarui.'
            );
    }


    /**
     * Memperbarui password akun admin.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                'current_password',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ], [
            'current_password.required' =>
                'Password saat ini wajib diisi.',

            'current_password.current_password' =>
                'Password saat ini tidak sesuai.',

            'password.required' =>
                'Password baru wajib diisi.',

            'password.string' =>
                'Password baru harus berupa teks.',

            'password.min' =>
                'Password baru minimal 8 karakter.',

            'password.confirmed' =>
                'Konfirmasi password tidak cocok.',
        ]);


        $user = Auth::user();


        $user->password = Hash::make(
            $request->password
        );


        $user->save();


        return redirect()
            ->route('admin.akun.index')
            ->with(
                'success',
                'Password berhasil diubah.'
            );
    }
}