<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\ketua\LaporanController as KetuaLaporanController;
use App\Http\Controllers\admin\SuratKeluarController;
use App\Http\Controllers\ketua\SuratKeluarController as KetuaSuratKeluarController;
use App\Http\Controllers\ketua\SuratMasukController as KetuaSuratMasukController;
use App\Http\Controllers\admin\SuratMasukController;
use App\Http\Controllers\ketua\DashboardController as KetuaDashboardController;

// akses admin
Route::middleware('admin')->prefix('admin')->group(function () {
    //dashboard & profile & laporan
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('admin.profile');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    //surat masuk
    Route::resource('surat-masuk', SuratMasukController::class)
        ->parameters(['surat-masuk' => 'no_surat'])
        ->names('admin.surat-masuk');
    Route::get('/surat-masuk/{no_surat}/disposisi', [SuratMasukController::class, 'disposisi'])->name('admin.surat-masuk.disposisi');
    Route::post('/surat-masuk/{no_surat}/disposisi', [SuratMasukController::class, 'disposisiHandle'])->name('admin.surat-masuk.disposisi.handle');
    //surat keluar
    Route::resource('surat-keluar', SuratkeluarController::class)
        ->parameters(['surat-keluar' => 'no_surat'])
        ->names('admin.surat-keluar');
});
// akses ketua
Route::middleware('ketua')->prefix('ketua')->group(function () {
    Route::get('/dashboard', [KetuaDashboardController::class, 'index'])->name('ketua.dashboard');
    Route::get('/profile', [AuthController::class, 'profile'])->name('ketua.profile');
    Route::get('/laporan', [KetuaLaporanController::class, 'index'])->name('ketua.laporan');


    Route::resource('surat-masuk', KetuaSuratMasukController::class)
        ->parameters(['surat-masuk' => 'no_surat'])
        ->names('ketua.surat-masuk');
    Route::resource('surat-keluar', KetuaSuratKeluarController::class)
        ->parameters(['surat-keluar' => 'no_surat'])
        ->names('ketua.surat-keluar');
});
// akses sekretaris
Route::middleware('sekretaris')->prefix('sekretaris')->group(function () {
    Route::get('/dashboard/sekretaris', fn() => 'Halaman Sekretaris');
});

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', function () {
    return view('Auth.register');
});
