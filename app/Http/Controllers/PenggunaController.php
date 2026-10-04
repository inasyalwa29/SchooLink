<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Cek akses Super Admin
    |--------------------------------------------------------------------------
    */

    private function checkSuperAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'super_admin') {
            abort(403, 'Akses hanya diperbolehkan untuk Super Admin.');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Tampilkan semua pengguna
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $this->checkSuperAdmin();

        /*
        |--------------------------------------------------------------------------
        | Search pengguna
        |--------------------------------------------------------------------------
        |
        | Bisa mencari berdasarkan:
        | - Nama
        | - Email
        |
        */

        $totalUsers = User::count();

        $query = User::query();

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('role', 'like', '%' . $search . '%');

            });
        }

        $users = $query
            ->orderBy('id', 'asc')
            ->get();


        return view(
            'admin.pengguna.index',
            compact('users', 'totalUsers')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Simpan pengguna baru
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $this->checkSuperAdmin();

        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:6',
                ],

                'role' => [
                    'required',
                    'in:super_admin,editor,staf_admin,staf_it',
                ],
            ],
            [
                'name.required' =>
                    'Nama wajib diisi.',

                'name.max' =>
                    'Nama maksimal 255 karakter.',

                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.max' =>
                    'Email maksimal 255 karakter.',

                'email.unique' =>
                    'Email sudah digunakan oleh pengguna lain.',

                'password.required' =>
                    'Password wajib diisi.',

                'password.min' =>
                    'Password minimal 6 karakter.',

                'role.required' =>
                    'Role wajib dipilih.',

                'role.in' =>
                    'Role yang dipilih tidak valid.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Buat akun pengguna
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => $validated['name'],

            'email' => $validated['email'],

            'password' => Hash::make(
                $validated['password']
            ),

            'role' => $validated['role'],

            'is_active' => true,

            'last_login_at' => null,
        ]);


        return redirect()
            ->route('admin.pengguna.index')
            ->with(
                'success',
                'Pengguna berhasil ditambahkan dan dapat digunakan untuk login.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Form edit pengguna
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $this->checkSuperAdmin();

        $user = User::findOrFail($id);

        return view(
            'admin.pengguna.edit',
            compact('user')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update pengguna
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        $id
    ) {
        $this->checkSuperAdmin();

        $user = User::findOrFail($id);


        $validated = $request->validate(
            [
                'name' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:users,email,' . $id,
                ],

                'role' => [
                    'required',
                    'in:super_admin,editor,staf_admin,staf_it',
                ],

                'password' => [
                    'nullable',
                    'string',
                    'min:6',
                ],
            ],
            [
                'name.required' =>
                    'Nama wajib diisi.',

                'name.max' =>
                    'Nama maksimal 255 karakter.',

                'email.required' =>
                    'Email wajib diisi.',

                'email.email' =>
                    'Format email tidak valid.',

                'email.unique' =>
                    'Email sudah digunakan oleh pengguna lain.',

                'role.required' =>
                    'Role wajib dipilih.',

                'role.in' =>
                    'Role yang dipilih tidak valid.',

                'password.min' =>
                    'Password minimal 6 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Update data dasar
        |--------------------------------------------------------------------------
        */

        $user->name = $validated['name'];

        $user->email = $validated['email'];

        $user->role = $validated['role'];


        /*
        |--------------------------------------------------------------------------
        | Update password jika diisi
        |--------------------------------------------------------------------------
        */

        if (
            isset($validated['password']) &&
            $validated['password'] !== ''
        ) {
            $user->password = Hash::make(
                $validated['password']
            );
        }


        $user->save();


        return redirect()
            ->route('admin.pengguna.index')
            ->with(
                'success',
                'Data pengguna berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Aktif / Nonaktifkan pengguna
    |--------------------------------------------------------------------------
    */

    public function toggleStatus($id)
    {
        $this->checkSuperAdmin();

        $user = User::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Tidak boleh menonaktifkan akun sendiri
        |--------------------------------------------------------------------------
        */

        if (auth()->id() === $user->id) {

            return redirect()
                ->route('admin.pengguna.index')
                ->with(
                    'error',
                    'Kamu tidak dapat menonaktifkan akun sendiri.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Ubah status
        |--------------------------------------------------------------------------
        */

        $user->is_active = !$user->is_active;

        $user->save();


        $status = $user->is_active
            ? 'diaktifkan'
            : 'dinonaktifkan';


        return redirect()
            ->route('admin.pengguna.index')
            ->with(
                'success',
                'Pengguna berhasil ' . $status . '.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Hapus pengguna
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $this->checkSuperAdmin();

        $user = User::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Tidak boleh menghapus akun sendiri
        |--------------------------------------------------------------------------
        */

        if (auth()->id() === $user->id) {

            return redirect()
                ->route('admin.pengguna.index')
                ->with(
                    'error',
                    'Kamu tidak dapat menghapus akun sendiri.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Hapus akun
        |--------------------------------------------------------------------------
        */

        $user->delete();


        return redirect()
            ->route('admin.pengguna.index')
            ->with(
                'success',
                'Pengguna berhasil dihapus.'
            );
    }
}