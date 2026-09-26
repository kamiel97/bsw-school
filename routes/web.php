<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\DashboardController;




// ====================
// Route Awal
// ====================

Route::get('/', function () {
    $profil = \App\Models\ProfileSekolah::first();

    return view('landing_page', compact('profil'));
});

// ====================
// Route Login
// ====================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ====================
// Route Admin
// ====================

Route::middleware('auth')->group(function () {

    Route::get('/admin', [AuthController::class, 'admin'])
        ->name('admin');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // ====================
    // CRUD USER
    // ====================

    Route::resource('/user', UserController::class)
    ->names('admin.user');

    // ====================
    // CRUD GURU
    // ====================

    Route::resource('/guru', GuruController::class)
        ->names('admin.guru');

    // ====================
    // CRUD SISWA
    // ====================

    Route::resource('/data-siswa', SiswaController::class)
        ->parameters(['data-siswa' => 'siswa'])
        ->names('admin.siswa');

    Route::resource('/ekstra', EkstrakurikulerController::class)
        ->parameters(['ekstra' => 'ekstrakurikuler'])
        ->names('admin.ekskul');



    Route::resource('/galeri', GaleriController::class)
        ->names('admin.galeri');

    Route::resource('/berita', BeritaController::class)
        ->parameters(['berita' => 'berita'])
        ->names('admin.berita');

    Route::resource('/pengumuman', PengumumanController::class)
        ->parameters(['pengumuman' => 'pengumuman'])
        ->names('admin.pengumuman');

    //profile
    Route::get('/profile', [ProfilSekolahController::class, 'index'])->name('admin.profile');
    Route::get('/profile/edit', [ProfilSekolahController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfilSekolahController::class, 'update'])->name('admin.profile.update');
});
