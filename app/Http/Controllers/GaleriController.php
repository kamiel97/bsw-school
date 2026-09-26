<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('pages.galeri.galeri', compact('galeris'));
    }

    public function create()
    {
        return view('pages.galeri.create_galeri');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'file' => 'required|file|mimes:jpg,jpeg,png,mp4,mov|max:10240',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $file = $request->file('file');

        $namaFile = time() . '_' . $file->getClientOriginalName();

        $file->move(
            public_path('uploads/galeri'),
            $namaFile
        );

        Galeri::create([
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'file' => $namaFile,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('pages.galeri.edit_galeri', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'keterangan' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov|max:10240',
            'kategori' => 'required|in:Foto,Video',
            'tanggal' => 'required|date',
        ]);

        $data = [
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
            'kategori' => $request->kategori,
            'tanggal' => $request->tanggal,
        ];

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $namaFile = time() . '_' . $file->getClientOriginalName();

            $file->move(
                public_path('uploads/galeri'),
                $namaFile
            );

            $data['file'] = $namaFile;
        }

        $galeri->update($data);

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}

