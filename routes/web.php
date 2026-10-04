<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminProfilController;
use App\Http\Controllers\AdminAkunController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminReviewController;

// Models
use App\Models\SchoolProfile;
use App\Models\Ekstrakurikuler;
use App\Models\ProgramKeahlian;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Review;


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIC
|--------------------------------------------------------------------------
*/


// Beranda
Route::get('/', function () {

    $schoolProfile = SchoolProfile::first();

    $ekstrakurikulers = Ekstrakurikuler::latest()->get();

    $programKeahlians = ProgramKeahlian::latest()->get();

    $beritas = Berita::latest()->get();

    $galeri = Galeri::latest()->get();

    $reviews = Review::where('status', 'approved')
        ->latest()
        ->get();

    return view('welcome', compact(
        'schoolProfile',
        'ekstrakurikulers',
        'programKeahlians',
        'beritas',
        'galeri',
        'reviews'
    ));

})->name('beranda');


// Profil
Route::get('/profil', function () {

    $schoolProfile = SchoolProfile::first();

    $ekstrakurikulers = Ekstrakurikuler::latest()->get();

    return view('profil', compact(
        'schoolProfile',
        'ekstrakurikulers'
    ));

})->name('profil');


// Program Keahlian Public
Route::get('/program-keahlian', function () {

    return view('program-keahlian');

})->name('program.keahlian');


// Berita Public
Route::get('/berita', function () {

    $beritas = Berita::latest()->get();

    return view('berita', compact('beritas'));

})->name('berita.public');


// Detail Berita Public
Route::get('/berita/{berita}', function (Berita $berita) {

    $beritaLain = Berita::where('id', '!=', $berita->id)
        ->orderByDesc('tanggal')
        ->take(3)
        ->get();

    return view('berita-detail', compact(
        'berita',
        'beritaLain'
    ));

})->name('berita.detail');


// Galeri Public
Route::get('/galeri', function () {

    $galeri = Galeri::latest()->get();

    return view('galeri', compact('galeri'));

})->name('galeri.public');


// Kontak
Route::get('/kontak', function () {

    return view('kontak');

})->name('kontak');


// Review Public
Route::post('/review', [ReviewController::class, 'store'])
    ->name('review.store');



/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER ADMIN
|--------------------------------------------------------------------------
*/


// Login
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login.process');


// Register
Route::get('/admin/register', [AdminRegisterController::class, 'showRegister'])
    ->name('admin.register');

Route::post('/admin/register', [AdminRegisterController::class, 'register'])
    ->name('admin.register.process');



/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {

            return view('admin.dashboard');

        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | LOGOUT
        |--------------------------------------------------------------------------
        */

        Route::post('/logout', [AdminLoginController::class, 'confirmLogout'])
            ->name('logout');



        /*
        |--------------------------------------------------------------------------
        | PROFIL SEKOLAH
        |--------------------------------------------------------------------------
        */

        Route::get('/profil', [AdminProfilController::class, 'index'])
            ->name('profil.index');

        Route::post('/profil', [AdminProfilController::class, 'update'])
            ->name('profil.update');



        /*
        |--------------------------------------------------------------------------
        | PROGRAM KEAHLIAN
        | Dikelola dari halaman Admin → Profil
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/profil/program-keahlian',
            [AdminProfilController::class, 'storeProgramKeahlian']
        )->name('profil.program-keahlian.store');


        Route::put(
            '/profil/program-keahlian/{id}',
            [AdminProfilController::class, 'updateProgramKeahlian']
        )->name('profil.program-keahlian.update');


        Route::delete(
            '/profil/program-keahlian/{id}',
            [AdminProfilController::class, 'destroyProgramKeahlian']
        )->name('profil.program-keahlian.destroy');



        /*
        |--------------------------------------------------------------------------
        | EKSTRAKURIKULER
        | Dikelola dari halaman Admin → Profil
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/profil/ekstrakurikuler',
            [EkstrakurikulerController::class, 'store']
        )->name('profil.ekstrakurikuler.store');


        Route::put(
            '/profil/ekstrakurikuler/{id}',
            [EkstrakurikulerController::class, 'update']
        )->name('profil.ekstrakurikuler.update');


        Route::patch(
            '/profil/ekstrakurikuler/{id}/status',
            [EkstrakurikulerController::class, 'toggleStatus']
        )->name('profil.ekstrakurikuler.status');


        Route::delete(
            '/profil/ekstrakurikuler/{id}',
            [EkstrakurikulerController::class, 'destroy']
        )->name('profil.ekstrakurikuler.destroy');



        /*
        |--------------------------------------------------------------------------
        | AKUN ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/akun', [AdminAkunController::class, 'index'])
            ->name('akun.index');

        Route::put('/akun', [AdminAkunController::class, 'update'])
            ->name('akun.update');

        Route::put('/akun/password', [AdminAkunController::class, 'updatePassword'])
            ->name('akun.password.update');



        /*
        |--------------------------------------------------------------------------
        | GALERI
        |--------------------------------------------------------------------------
        */

        Route::get('/galeri', [GaleriController::class, 'index'])
            ->name('galeri.index');

        Route::get('/galeri/create', [GaleriController::class, 'create'])
            ->name('galeri.create');

        Route::post('/galeri', [GaleriController::class, 'store'])
            ->name('galeri.store');

        Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])
            ->name('galeri.edit');

        Route::put('/galeri/{id}', [GaleriController::class, 'update'])
            ->name('galeri.update');

        Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])
            ->name('galeri.destroy');



        /*
        |--------------------------------------------------------------------------
        | BERITA
        |--------------------------------------------------------------------------
        */

        Route::get('/berita', [BeritaController::class, 'index'])
            ->name('berita.index');

        Route::get('/berita/create', [BeritaController::class, 'create'])
            ->name('berita.create');

        Route::post('/berita', [BeritaController::class, 'store'])
            ->name('berita.store');

        Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])
            ->name('berita.edit');

        Route::put('/berita/{id}', [BeritaController::class, 'update'])
            ->name('berita.update');

        Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])
            ->name('berita.destroy');



        /*
        |--------------------------------------------------------------------------
        | REVIEW
        |--------------------------------------------------------------------------
        */

        Route::get('/review', [AdminReviewController::class, 'index'])
            ->name('review.index');

        Route::patch('/review/{id}/approve', [AdminReviewController::class, 'approve'])
            ->name('review.approve');

        Route::delete('/review/{id}', [AdminReviewController::class, 'destroy'])
            ->name('review.destroy');



        /*
        |--------------------------------------------------------------------------
        | PENGGUNA
        |--------------------------------------------------------------------------
        */

        Route::get('/pengguna', [PenggunaController::class, 'index'])
            ->name('pengguna.index');

        Route::post('/pengguna', [PenggunaController::class, 'store'])
            ->name('pengguna.store');

        Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])
            ->name('pengguna.edit');

        Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])
            ->name('pengguna.update');

        Route::patch('/pengguna/{id}/status', [PenggunaController::class, 'toggleStatus'])
            ->name('pengguna.status');

        Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])
            ->name('pengguna.destroy');

    });