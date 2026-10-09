<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class SiswaController extends Controller
{
     public function index(Request $request)
    {
        $search = $request->search;

        $siswas = Siswa::when($search, function ($query) use ($search) {
            $query->where('nama_siswa', 'like', "%{$search}%")
                ->orWhere('nisn', 'like', "%{$search}%")
                ->orWhere('jenis_kelamin', 'like', "%{$search}%")
                ->orWhere('tahun_masuk', 'like', "%{$search}%");
        })->latest()->get();

        return view('pages.siswa.data-siswa', compact('siswas', 'search'));
    }


    public function create()
    {


        return view('pages/siswa/create_siswa');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nisn' => 'required|digits:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required|digits:4',
        ]);

        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('admin.siswa.index');
        }


          $siswa = Siswa::findOrFail($id);

        return view('pages/siswa/edit_siswa', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {

        $request->validate([
            'nisn' => 'required|digits:10',
            'nama_siswa' => 'required|max:40',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required|digits:4',
        ]);

        $siswa->update([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
