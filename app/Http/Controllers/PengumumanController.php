<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::with('user')->latest()->get();

        return view('pages.pengumuman.pengumuman', compact('pengumumans'));
    }

    public function create()
    {
        return view('pages.pengumuman.create_pengumuman');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'id_user' => Auth::user()->id_user,
        ];

        Pengumuman::create($data);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view(
            'pages.pengumuman.edit_pengumuman',
            compact('pengumuman')
        );
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required|max:50',
            'isi' => 'required',
            'tanggal' => 'required|date',
            'status' => 'required|in:Publish,Draft',
        ]);

        $data = [
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
        ];

        $pengumuman->update($data);

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()
            ->route('admin.pengumuman.index')
            ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
