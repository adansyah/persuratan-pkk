<?php

namespace App\Http\Controllers\sekte;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = SuratMasuk::query();

        if ($request->filled('no_surat')) {
            $query->where('no_surat', $request->no_surat);
        }
        // Filter berdasarkan tanggal surat masuk
        if ($request->filled('tgl_surat')) {
            $query->whereDate('tgl_surat', $request->tgl_surat);
        }

        // Filter berdasarkan tanggal surat keluar
        // if ($request->filled('tgl_surat_keluar')) {
        //     $query->whereDate('tgl_surat_keluar', $request->tgl_surat_keluar);
        // }

        $data = $query->latest()->paginate(10);

        return view('pages.sekretaris.suratmasuk.laporan', compact('data'));
    }

    public function laporan(Request $request)
    {
        $query = SuratKeluar::query();

        if ($request->filled('no_surat')) {
            $query->where('no_surat', $request->no_surat);
        }
        // Filter berdasarkan tanggal surat masuk
        if ($request->filled('tgl_surat')) {
            $query->whereDate('tgl_surat', $request->tgl_surat);
        }

        // Filter berdasarkan tanggal surat keluar
        // if ($request->filled('tgl_surat_keluar')) {
        //     $query->whereDate('tgl_surat_keluar', $request->tgl_surat_keluar);
        // }

        $data = $query->latest()->paginate(10);

        return view('pages.sekretaris.suratkeluar.laporan', compact('data'));
    }

    public function exportPDF()
    {
        $laporan = SuratMasuk::all();

        $pdf = Pdf::loadView('pages.sekretaris.suratmasuk.export_all', compact('laporan'));
        return $pdf->download('data_laporan_Masuk.pdf');
    }
    public function exportPDFOut()
    {
        $laporan = SuratKeluar::all();

        $pdf = Pdf::loadView('pages.sekretaris.suratkeluar.export_all', compact('laporan'));
        return $pdf->download('data_laporan_Keluar.pdf');
    }


    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect()->route('sekretaris.laporan')->with('success', 'Data laporan berhasil dihapus');
    }
}
