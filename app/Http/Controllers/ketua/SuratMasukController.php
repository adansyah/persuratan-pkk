<?php

namespace App\Http\Controllers\ketua;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function exportPDF($no_surat)
    {
        $suratmasuk = SuratMasuk::where('no_surat', $no_surat)->firstOrFail();

        $pdf = Pdf::loadView('pages.ketua.exportmasuk', compact('suratmasuk', 'no_surat'));
        return $pdf->download('data_surat-masuk.pdf');
    }
}
