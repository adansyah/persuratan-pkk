<?php

namespace App\Http\Controllers\ketua;

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
        $disposisi = SuratKeluar::whereIn('status', ['diterima', 'dibatalkan'])->count();
        return view('pages.ketua.dashboard', compact('suratmasuk', 'suratkeluar', 'disposisi'));
    }
}
