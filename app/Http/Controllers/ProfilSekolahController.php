<?php

namespace App\Http\Controllers;

use App\Models\ProfileSekolah;
use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    public function index()
    {
        $profil = ProfileSekolah::first();

        return view('pages.profile.profile', compact('profil'));
    }

    public function edit()
    {
        $profil = ProfileSekolah::first();

        return view('pages.profile.edit_profile', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required|max:40',
            'kepala_sekolah' => 'required|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'npsn' => 'required|max:10',
            'alamat' => 'required',
            'kontak' => 'required|max:15',
            'visi_misi' => 'required',
            'tahun_berdiri' => 'required|digits:4',
            'deskripsi' => 'required',
        ]);

        $profil = ProfileSekolah::first();

        if (!$profil) {
            $profil = new ProfileSekolah();
        }

        $profil->nama_sekolah = $request->nama_sekolah;
        $profil->kepala_sekolah = $request->kepala_sekolah;
        $profil->npsn = $request->npsn;
        $profil->alamat = $request->alamat;
        $profil->kontak = $request->kontak;
        $profil->visi_misi = $request->visi_misi;
        $profil->tahun_berdiri = $request->tahun_berdiri;
        $profil->deskripsi = $request->deskripsi;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            $foto->move(
                public_path('uploads/profile'),
                $namaFoto
            );

            $profil->foto = $namaFoto;
        }

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $namaLogo = time() . '_' . $logo->getClientOriginalName();

            $logo->move(
                public_path('uploads/profile'),
                $namaLogo
            );

            $profil->logo = $namaLogo;
        }

        $profil->save();

        return redirect()
            ->route('admin.profile')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}

