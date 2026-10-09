<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $galeris = Galeri::when($search, function ($query) use ($search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        })->latest()->get();

        return view('pages.galeri.galeri', compact('galeris', 'search'));

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

        $namaFile = time().'_'.$file->getClientOriginalName();

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

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('admin.galeri.index');
        }

        $galeri = Galeri::findOrFail($id);

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

            $namaFile = time().'_'.$file->getClientOriginalName();

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

    public function publicIndex(Request $request)
    {

        $search = $request->search;

        $galeris = Galeri::when($search, function ($query) use ($search) {
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%");
        })->latest()->get();

        return view('public.galeri_public', compact('galeris', 'search'));
    }

    public function destroy(Galeri $galeri)
    {
        $galeri->delete();

        return redirect()
            ->route('admin.galeri.index')
            ->with('success', 'Data galeri berhasil dihapus.');
    }
}
