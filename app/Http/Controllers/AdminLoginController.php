<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }


    /*
    |--------------------------------------------------------------------------
    | PROSES LOGIN
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => [
                'required',
                'email',
            ],

            'password' => [
                'required',
            ],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CARI USER
        |--------------------------------------------------------------------------
        */

        $user = User::where('email', $validated['email'])->first();


        /*
        |--------------------------------------------------------------------------
        | CEK USER
        |--------------------------------------------------------------------------
        */

        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email atau kata sandi salah.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CEK STATUS AKUN
        |--------------------------------------------------------------------------
        */

        if (!$user->is_active) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Akun kamu sedang dinonaktifkan. Silakan hubungi Super Admin.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CEK PASSWORD
        |--------------------------------------------------------------------------
        */

        $storedPassword = (string) $user->password;

        $isBcryptHash =
            str_starts_with($storedPassword, '$2y$') ||
            str_starts_with($storedPassword, '$2a$') ||
            str_starts_with($storedPassword, '$2b$');

        $passwordBenar = false;


        /*
        |--------------------------------------------------------------------------
        | PASSWORD SUDAH HASH
        |--------------------------------------------------------------------------
        */

        if ($isBcryptHash) {
            $passwordBenar = Hash::check(
                $validated['password'],
                $storedPassword
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PASSWORD MASIH PLAINTEXT
        |--------------------------------------------------------------------------
        */

        else {
            $passwordBenar = hash_equals(
                $storedPassword,
                (string) $validated['password']
            );


            /*
            |--------------------------------------------------------------------------
            | OTOMATIS UBAH PASSWORD PLAINTEXT MENJADI HASH
            |--------------------------------------------------------------------------
            */

            if ($passwordBenar) {
                $user->password = Hash::make(
                    $validated['password']
                );

                $user->save();
            }
        }


        /*
        |--------------------------------------------------------------------------
        | PASSWORD SALAH
        |--------------------------------------------------------------------------
        */

        if (!$passwordBenar) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'Email atau kata sandi salah.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | LOGIN
        |--------------------------------------------------------------------------
        */

        Auth::login($user);

        $request->session()->regenerate();


        /*
        |--------------------------------------------------------------------------
        | UPDATE LAST LOGIN
        |--------------------------------------------------------------------------
        */

        $user->last_login_at = now();

        $user->save();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT DASHBOARD
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Selamat datang, ' . $user->name . '!');
    }


    /*
    |--------------------------------------------------------------------------
    | KONFIRMASI LOGOUT DENGAN PASSWORD
    |--------------------------------------------------------------------------
    */

    public function confirmLogout(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI PASSWORD
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'password' => [
                'required',
            ],
        ], [
            'password.required' => 'Kata sandi wajib diisi.',
        ]);


        /*
        |--------------------------------------------------------------------------
        | CEK USER YANG SEDANG LOGIN
        |--------------------------------------------------------------------------
        */

        $user = Auth::user();


        if (!$user) {
            return redirect()
                ->route('admin.login');
        }


        /*
        |--------------------------------------------------------------------------
        | CEK PASSWORD
        |--------------------------------------------------------------------------
        */

        if (!Hash::check($validated['password'], $user->password)) {
            return back()
                ->withErrors([
                    'password' => 'Kata sandi yang kamu masukkan salah.',
                ])
                ->with('logout_modal', true);
        }


        /*
        |--------------------------------------------------------------------------
        | LOGOUT
        |--------------------------------------------------------------------------
        */

        Auth::logout();


        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        /*
        |--------------------------------------------------------------------------
        | KEMBALI KE LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.login')
            ->with(
                'success',
                'Kamu berhasil keluar dari sistem.'
            );
    }
}