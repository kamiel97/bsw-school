<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class EkstrakurikulerController extends Controller
{

     public function index(Request $request)
    {
        $search = $request->search;

        $ekstras = Ekstrakurikuler::when($search, function ($query) use ($search) {
            $query->where('nama_ekskul', 'like', "%{$search}%")
                ->orWhere('pembina', 'like', "%{$search}%")
                ->orWhere('jadwal_latihan', 'like', "%{$search}%");
        })->latest()->get();

        return view('pages.ekstrakulikuler.ekstra', compact('ekstras', 'search'));
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

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('admin.ekskul.index');
        }

         $ekstras = Ekstrakurikuler::findOrFail($id);

        return view('pages.ekstrakulikuler.edit_ekstra', compact('ekstras'));
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

    public function publicIndex(Request $request){

      $search = $request->search;

        $ekstras = Ekstrakurikuler::when($search, function ($query) use ($search) {
            $query->where('nama_ekskul', 'like', "%{$search}%")
                ->orWhere('pembina', 'like', "%{$search}%")
                ->orWhere('jadwal_latihan', 'like', "%{$search}%");
        })->latest()->get();

      return view('ekstra_public', compact('ekstras', 'search'));
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->delete();

        return redirect()
            ->route('admin.ekskul.index')
            ->with('success', 'Data ekstrakurikuler berhasil dihapus.');
    }
}
