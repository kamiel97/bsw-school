<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use illuminate\Contracts\Encryption\DecryptException;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::with('user')->latest()->get();

        return view('pages.berita.berita', compact('beritas'));
    }

    public function create()
    {
        return view('pages.berita.create_berita');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => Auth::user()->id_user,
        ];

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');

            $namaGambar = time() . '_' . $gambar->getClientOriginalName();

            $gambar->move(
                public_path('uploads/berita'),
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function publicIndex()
    {
        $beritas = Berita::where('status', 'Publish')
            ->latest('tanggal')
            ->get();

        return view('berita_public', compact('beritas'));
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('admin.berita.index');
        }

        $berita = Berita::findOrFail($id);

        return view('pages.berita.edit_berita', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:Publish,Draft',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];

        if ($request->hasFile('gambar')) {

            $gambar = $request->file('gambar');

            $namaGambar = time() . '_' . $gambar->getClientOriginalName();

            $gambar->move(
                public_path('uploads/berita'),
                $namaGambar
            );

            $data['gambar'] = $namaGambar;
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
