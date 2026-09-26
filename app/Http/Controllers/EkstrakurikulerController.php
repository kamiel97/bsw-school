<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstras = Ekstrakurikuler::latest()->get();

        return view('pages.ekstrakulikuler.ekstra', compact('ekstras'));
    }

    public function create()
    {
        return view('pages.ekstrakulikuler.create_ekstra');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/ekstrakurikuler'), $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        Ekstrakurikuler::create($data);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil ditambahkan.');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('pages.ekstrakulikuler.edit_ekstra', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $request->validate([
            'nama_ekskul' => 'required|max:40',
            'pembina' => 'required|max:40',
            'jadwal_latihan' => 'required|max:40',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'jadwal_latihan' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('uploads/ekstrakurikuler'), $namaGambar);

            $data['gambar'] = $namaGambar;
        }

        $ekstrakurikuler->update($data);

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}