<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    public function index()
    {

        if (Auth::user()->role === 'Operator') {
            abort(403);
        }

        $users = User::all();

        return view('pages/user/user', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->role === 'Operator') {
            abort(403);
        }

        return view('pages.user.create_user');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role === 'Operator') {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        try {
            $id = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect()->route('admin.user.index');
        }
        if (Auth::user()->role === 'Operator') {
            abort(403);
        }


        $user = User::findOrFail($id);

        return view('pages.user.edit_user', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->role === 'Operator') {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id_user . ',id_user',
            'email' => 'required|email|unique:users,email,' . $user->id_user . ',id_user',
            'role' => 'required'
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if (Auth::user()->role === 'Operator') {
            abort(403);
        }

        $user = User::findOrFail($id);

        if ($user->id_user == Auth::id()) {
            return back()->with('error', 'User yang sedang login tidak dapat dihapus.');
        }

        $user->delete();

        return back()->with('success', 'User berhasil dihapus.');
    }
}
