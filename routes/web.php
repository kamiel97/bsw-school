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
use App\Models\Berita;
use App\Models\Pengumuman;




// ====================
// Route Awal
// ====================

Route::get('/', function () {
    $profil = \App\Models\ProfileSekolah::first();
    $berita = Berita::where('status', 'Publish')
                    ->latest('tanggal')
                    ->get();
    $pengumumans = Pengumuman::where('status', 'Publish')
                    ->latest()
                    ->get();
    return view('landing_page', compact('profil','berita','pengumumans'));
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

    Route::resource('/siswa', SiswaController::class)
        ->parameters(['siswa' => 'siswa'])
        ->names('admin.siswa');

    // ====================
    // CRUD EXTRA
    // ====================

    Route::resource('/ekstra', EkstrakurikulerController::class)
        ->parameters(['ekstra' => 'ekstrakurikuler'])
        ->names('admin.ekskul');

    // ====================
    // CRUD GALERI
    // ====================

    Route::resource('/galeri', GaleriController::class)
        ->names('admin.galeri');

    // ====================
    // CRUD BERITA
    // ====================

    Route::resource('/berita', BeritaController::class)
        ->parameters(['berita' => 'berita'])
        ->names('admin.berita');

    // ====================
    // CRUD PENGUMUMAN
    // ====================

    Route::resource('/pengumuman', PengumumanController::class)
        ->parameters(['pengumuman' => 'pengumuman'])
        ->names('admin.pengumuman');

    //profile
    Route::get('/profile', [ProfilSekolahController::class, 'index'])->name('admin.profile');
    Route::get('/profile/edit', [ProfilSekolahController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [ProfilSekolahController::class, 'update'])->name('admin.profile.update');
});
