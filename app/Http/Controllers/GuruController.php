<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $gurus = Guru::when($search, function ($query) use ($search) {
            $query->where('nama_guru', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%");
        })->latest()->get();

        // $gurus = Guru::orderBy('id_guru', 'asc')->get();

        return view('pages.guru.data_guru', compact('gurus', 'search'));
    }

    public function create()
    {

        return view('pages/guru/create_guru');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|max:15',
            'mapel' => 'required|max:40',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = $request->file('foto')->store('guru', 'public');

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
            'foto' => $foto,
        ]);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('admin.guru.index');
        }

        $guru = Guru::findOrFail($id);

        return view('pages/guru/edit_guru', compact('guru'));
    }

    public function update(Request $request, Guru $guru)
    {

        $request->validate([
            'nama_guru' => 'required|max:40',
            'nip' => 'required|max:15',
            'mapel' => 'required|max:40',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_guru' => $request->nama_guru,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
        ];

        if ($request->hasFile('foto')) {

            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }

            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil diubah.');
    }

    public function detail($id)
    {
         try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('landing_page');
        }

        $guru = Guru::findOrFail($id);

        return view('detail.guru_detail', compact('guru'));
    }

    public function publicIndex(Request $request)
    {
        $search = $request->search;

        $gurus = Guru::when($search, function ($query) use ($search) {
            $query->where('nama_guru', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%")
                ->orWhere('mapel', 'like', "%{$search}%");
        })->latest()->get();

        // $gurus = Guru::all();

        return view('public.guru_public', compact('gurus', 'search'));
    }

    public function destroy(Guru $guru)
    {

        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
