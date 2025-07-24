<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\LaporanController as AdminLaporanController;
use App\Http\Controllers\admin\SuratMasukController as AdminSuratMasukController;
use App\Http\Controllers\admin\SuratKeluarController as AdminSuratKeluarController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\admin\DashboardController as HomeController;
use App\Http\Controllers\ketua\DashboardController as KetuaDashboardController;
use App\Http\Controllers\ketua\SuratMasukController as KetuaSuratMasukController;
use App\Http\Controllers\ketua\SuratKeluarController as KetuaSuratKeluarController;
use App\Http\Controllers\ketua\LaporanController as KetuaLaporanController;
use App\Http\Controllers\ketua\ProfileController as KetuaProfileController;
use App\Http\Controllers\sekte\DashboardController as SekteDashboardController;
use App\Http\Controllers\sekte\SuratKeluarController as SekteSuratKeluarController;
use App\Http\Controllers\sekte\SuratMasukController as SekteSuratMasukController;
use App\Http\Controllers\sekte\LaporanController as SekteLaporanController;
use App\Http\Controllers\sekte\ProfileController as SekteProfileController;

// akses admin
Route::middleware('admin')->prefix('admin')->group(function () {
    //dashboard & profile & laporan
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/laporan-masuk', [AdminLaporanController::class, 'index'])->name('admin.laporan-masuk');
    Route::get('/laporan-keluar', [AdminLaporanController::class, 'Laporan'])->name('admin.laporan-keluar');
    Route::get('/laporan-masuk/export', [AdminLaporanController::class, 'exportPDF'])->name('admin.laporan-masuk.export');
    Route::get('/laporan-keluar/export', [AdminLaporanController::class, 'exportPDFOut'])->name('admin.laporan-keluar.export');
    Route::get('/surat-masuk/export/{no_surat}', [AdminSuratMasukController::class, 'exportPDF'])->name('admin.suratmasuk.export');
    Route::get('/surat-keluar/export/{no_surat}', [AdminSuratKeluarController::class, 'exportPDF'])->name('admin.suratkeluar.export');
    //surat masuk
    Route::resource('surat-masuk', AdminSuratMasukController::class)
        ->parameters(['surat-masuk' => 'no_surat'])
        ->names('admin.surat-masuk');
    Route::get('/surat-masuk/{no_surat}/disposisi', [AdminSuratMasukController::class, 'disposisi'])->name('admin.surat-masuk.disposisi');
    Route::post('/surat-masuk/{no_surat}/disposisi', [ADminSuratMasukController::class, 'disposisiHandle'])->name('admin.surat-masuk.disposisi.handle');
    //surat keluar
    Route::resource('surat-keluar', AdminSuratkeluarController::class)
        ->parameters(['surat-keluar' => 'no_surat'])
        ->names('admin.surat-keluar');
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::get('/profile/create', [AdminProfileController::class, 'create'])->name('admin.profile.create');
    Route::post('/profile/store', [AdminProfileController::class, 'store'])->name('admin.profile.store');
    Route::get('/profile/edit/{id}', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile/update/{id}', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile/destroy/{id}', [AdminProfileController::class, 'destroy'])->name('admin.profile.destroy');
});
// akses ketua
Route::middleware('ketua')->prefix('ketua')->group(function () {
    Route::get('/dashboard', [KetuaDashboardController::class, 'index'])->name('ketua.dashboard');
    Route::get('/profile', [KetuaProfileController::class, 'index'])->name('ketua.profile');
    Route::get('/laporan-masuk', [KetuaLaporanController::class, 'index'])->name('ketua.laporan-masuk');
    Route::get('/laporan-keluar', [KetuaLaporanController::class, 'Laporan'])->name('ketua.laporan-keluar');
    Route::get('/laporan-masuk/export', [KetuaLaporanController::class, 'exportPDF'])->name('ketua.laporan-masuk.export');
    Route::get('/laporan-keluar/export', [KetuaLaporanController::class, 'exportPDFOut'])->name('ketua.laporan-keluar.export');
    Route::get('/surat-keluar/export/{no_surat}', [KetuaSuratKeluarController::class, 'exportPDF'])->name('ketua.suratkeluar.export');
    Route::get('/surat-masuk/export/{no_surat}', [KetuaSuratMasukController::class, 'exportPDF'])->name('ketua.suratmasuk.export');


    Route::resource('surat-masuk', KetuaSuratMasukController::class)
        ->parameters(['surat-masuk' => 'no_surat'])
        ->names('ketua.surat-masuk');
    Route::resource('surat-keluar', KetuaSuratKeluarController::class)
        ->parameters(['surat-keluar' => 'no_surat'])
        ->names('ketua.surat-keluar');
});
// akses sekretaris
Route::middleware('sekretaris')->prefix('sekretaris')->group(function () {
    Route::get('/dashboard', [SekteDashboardController::class, 'index'])->name('sekretaris.dashboard');
    Route::get('/laporan-masuk', [SekteLaporanController::class, 'index'])->name('sekretaris.laporan-masuk');
    Route::get('/laporan-keluar', [SekteLaporanController::class, 'Laporan'])->name('sekretaris.laporan-keluar');
    Route::get('/laporan-masuk/export', [SekteLaporanController::class, 'exportPDF'])->name('sekretaris.laporan-masuk.export');
    Route::get('/laporan-keluar/export', [SekteLaporanController::class, 'exportPDFOut'])->name('sekretaris.laporan-keluar.export');
    Route::get('/surat-masuk/export/{no_surat}', [SekteLaporanController::class, 'exportPDF'])->name('sekretaris.suratmasuk.export');
    Route::get('/surat-keluar/export/{no_surat}', [SekteLaporanController::class, 'exportPDF'])->name('sekretaris.suratkeluar.export');

    //surat masuk
    Route::resource('surat-masuk', SekteSuratMasukController::class)
        ->parameters(['surat-masuk' => 'no_surat'])
        ->names('sekretaris.surat-masuk');

    Route::resource('surat-keluar', SekteSuratkeluarController::class)
        ->parameters(['surat-keluar' => 'no_surat'])
        ->names('sekretaris.surat-keluar');
    Route::get('/profile', [SekteProfileController::class, 'index'])->name('sekretaris.profile');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
