<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('pages.admin.Profile.index', compact('user'));
    }

    public function create()
    {
        return view('pages.admin.Profile.create');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('pages.admin.Profile.edit', compact('data'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validated();
        // Update data dasar
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];

        // Hanya update password jika ada input
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        // Update gambar jika ada file baru
        if ($request->hasFile('file')) {
            // Hapus gambar lama jika ada
            if ($user->file && Storage::exists($user->file)) {
                Storage::delete($user->file);
            }

            // Simpan gambar baru
            $path = $request->file('file')->store('users', 'public');
            $user->file = $path;
        }

        $user->save();

        return redirect()->route('admin.profile')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Hapus file jika ada
        if ($user->file && Storage::disk('public')->exists($user->file)) {
            Storage::disk('public')->delete($user->file);
        }

        // Simpan apakah user yang login sedang dihapus
        $isCurrentUser = Auth::id() == $user->id;

        $user->delete();

        // Jika user login yang dihapus, logout dan redirect ke login
        if ($isCurrentUser) {
            Auth::logout();
            return redirect()->route('login')->with('success', 'Akun Anda berhasil dihapus.');
        }

        // Jika bukan user login, kembalikan ke halaman sebelumnya
        return back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}
