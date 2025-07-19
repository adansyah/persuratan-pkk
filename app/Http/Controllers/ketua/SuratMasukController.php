<?php

namespace App\Http\Controllers\ketua;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratMasukController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $suratmasuk = SuratMasuk::when($search, function ($query, $search) {
            $query->where('no_surat', 'like', "%{$search}%")
                ->orWhere('nama_surat', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('pages.ketua.surat-masuk', compact('suratmasuk'));
    }
}
