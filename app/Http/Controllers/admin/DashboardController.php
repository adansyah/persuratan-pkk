<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $suratmasuk = SuratMasuk::count();
        $suratkeluar = SuratKeluar::count();
        $user = User::count();
        return view('pages.admin.Dashboard', compact('suratmasuk', 'suratkeluar', 'user'));
    }
}
