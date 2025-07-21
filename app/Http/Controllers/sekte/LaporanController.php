<?php

namespace App\Http\Controllers\sekte;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::query();

        if ($request->filled('jenis_surat')) {
            $query->where('jenis_surat', $request->jenis_surat);
        }
        // Filter berdasarkan tanggal surat masuk
        if ($request->filled('tgl_surat_masuk')) {
            $query->whereDate('tgl_surat_masuk', $request->tgl_surat_masuk);
        }

        // Filter berdasarkan tanggal surat keluar
        if ($request->filled('tgl_surat_keluar')) {
            $query->whereDate('tgl_surat_keluar', $request->tgl_surat_keluar);
        }

        $data = $query->latest()->paginate(10);

        return view('pages.sekretaris.laporan', compact('data'));
    }

    public function exportPDF()
    {
        $laporan = Laporan::all();

        $pdf = Pdf::loadView('pages.sekretaris.export', compact('laporan'));
        return $pdf->download('data_laporan.pdf');
    }

    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect()->route('sekretaris.laporan')->with('success', 'Data laporan berhasil dihapus');
    }
}
