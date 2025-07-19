<?php

namespace App\Http\Controllers\admin;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SuratKeluarRequest;

class SuratKeluarController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->search;

        $data = SuratKeluar::when($search, function ($query, $search) {
            $query->where('no_surat', 'like', "%{$search}%")
                ->orWhere('nama_surat', 'like', "%{$search}%");
        })->latest()->paginate(10)->withQueryString();

        return view('pages.admin.suratkeluar.index', compact('data'));
    }

    public function edit($no_surat)
    {
        $data = SuratKeluar::where('no_surat', $no_surat)->firstOrFail();

        return view('pages.admin.suratkeluar.edit', compact('data'));
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

        return redirect()->route('admin.surat-keluar.index')->with('success', 'Data berhasil diperbarui.');
        // dd($suratkeluar);
    }

    public function destroy($no_surat)
    {
        $suratkeluar = SuratKeluar::where('no_surat', $no_surat)->firstOrFail();

        if ($suratkeluar->file && Storage::disk('public')->exists($suratkeluar->file)) {
            Storage::disk('public')->delete($suratkeluar->file);
        }

        $suratkeluar->delete();

        return redirect()->route('admin.surat-keluar.index')->with('success', 'Data berhasil dihapus.');
    }
}
