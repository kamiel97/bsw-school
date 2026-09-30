<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Berita;
use App\Models\Pengumuman;
use App\Models\Ekstrakurikuler;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahGuru = Guru::count();
        $jumlahSiswa = Siswa::count();
        $jumlahBerita = Berita::count();
        $jumlahPengumuman = Pengumuman::count();
        $jumlahEkskul = Ekstrakurikuler::count();
        $jumlahGaleri = Galeri::count();

        $user = Auth::user();

        return view('pages.dashboard', compact(
            'jumlahUser',
            'jumlahGuru',
            'jumlahSiswa',
            'jumlahBerita',
            'jumlahPengumuman',
            'jumlahEkskul',
            'jumlahGaleri',
            'user'
        ));
    }
    
}
