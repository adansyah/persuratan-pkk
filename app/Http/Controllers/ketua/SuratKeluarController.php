<?php

namespace App\Http\Controllers\ketua;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $data = SuratKeluar::when($search, function ($query, $search) {
            $query->where('no_surat', 'like', "%{$search}%")
                ->orWhere('nama_surat', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('pages.ketua.surat-keluar', compact('data'));
    }
}
