<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($request->role !== $user->role) {
                Auth::logout();
                return redirect()->back()->withErrors(['role' => 'Peran tidak sesuai dengan akun']);
            }


            return match ($user->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'sekretaris' => redirect('/sekretaris/dashboard'),
                'ketua' => redirect('/ketua/dashboard'),
            };
        }

        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda Berhasil logout');
    }

    public function profile()
    {
        return view('pages.admin.profile.index');
    }
}
