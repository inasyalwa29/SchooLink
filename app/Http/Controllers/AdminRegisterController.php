<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminRegisterController extends Controller
{
    public function showRegister()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'agreement' => 'required',
        ], [
            'nama.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email tersebut sudah terdaftar.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
            'agreement.required' => 'Kamu harus menyetujui penggunaan akun admin.',
        ]);

        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()
            ->route('admin.login')
            ->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    }
}