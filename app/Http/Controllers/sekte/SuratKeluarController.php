<?php

namespace App\Http\Controllers\sekte;

use App\Models\SuratKeluar;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuratKeluarRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SuratKeluarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $data = SuratKeluar::when($search, function ($query, $search) {
            $query->where('no_surat', 'like', "%{$search}%")
                ->orWhere('nama_surat', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('pages.sekretaris.suratkeluar.index', compact('data'));
    }

    public function create()
    {
        $nosurat = 'SM' . rand(1000, 9999);
        return view('pages.sekretaris.suratkeluar.create', ['nosurat' => $nosurat]);
    }

    public function store(SuratKeluarRequest $request)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('file')) {
                $file      = $request->file('file');
                $fileName  = time() . '-' . $file->getClientOriginalName();
                $filePath  = $file->storeAs('surat-keluar', $fileName, 'public');
            }

            suratKeluar::create([
                'no_surat'     => $validated['no_surat'],
                'nama_surat'     => $validated['nama_surat'],
                'tgl_surat'    => $validated['tgl_surat'],
                'tgl_dikirim'  => $validated['tgl_dikirim'],
                'keterangan'       => $validated['keterangan'],
                'perihal'      => $validated['perihal'],
                'status'       => $validated['status'],
                'file'         => $filePath ?? null,
                'user_id'      => $validated['user_id'] ?? Auth::id(),
            ]);

            Laporan::create([
                'user_id'         => Auth::id(),
                'jenis_surat'     => 'masuk',
                'tgl_surat_masuk' => now(),
                'keterangan'      => 'Surat Keluar ditambahkan',
                'file'         => $filePath ?? null,
            ]);

            return redirect()->route('sekretaris.surat-keluar.index')->with('success', 'Surat berhasil disimpan.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan surat keluar: ' . $e->getMessage());

            // return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan surat.']);
            dd($e->getMessage());
        }
    }

    public function edit($no_surat)
    {
        $data = SuratKeluar::where('no_surat', $no_surat)->firstOrFail();

        return view('pages.sekretaris.suratkeluar.edit', compact('data'));
    }

    public function update(SuratKeluarRequest $request, $no_surat)
    {
        $suratkeluar = SuratKeluar::where('no_surat', $no_surat)->firstOrFail();

        $validated = $request->validated();

        if ($request->hasFile('file')) {
            if ($suratkeluar->file && Storage::disk('public')->exists($suratkeluar->file)) {
                Storage::disk('public')->delete($suratkeluar->file);
            }

            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $validated['file'] = $file->storeAs('surat-keluar', $fileName, 'public');
        }

        $suratkeluar->update($validated);

        return redirect()->route('sekretaris.surat-keluar.index')->with('success', 'Data berhasil diperbarui.');
        // dd($suratkeluar);
    }

    public function destroy($no_surat)
    {
        $suratkeluar = SuratKeluar::where('no_surat', $no_surat)->firstOrFail();

        if ($suratkeluar->file && Storage::disk('public')->exists($suratkeluar->file)) {
            Storage::disk('public')->delete($suratkeluar->file);
        }

        $suratkeluar->delete();

        return redirect()->route('sekretaris.surat-keluar.index')->with('success', 'Data berhasil dihapus.');
    }

    public function exportPDF($no_surat)
    {
        $suratkeluar = SuratKeluar::where('no_surat', $no_surat)->firstOrFail();

        $pdf = Pdf::loadView('pages.sekretaris.suratkeluar.export', compact('suratkeluar', 'no_surat'));
        return $pdf->download('data_surat-keluar.pdf');
    }
}
