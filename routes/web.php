<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('pages.admin.dashboard');
});
Route::get('/', function () {
    return view('Auth.login');
});
Route::get('/register', function () {
    return view('Auth.register');
});
Route::get('/surat-masuk', function () {
    return view('pages.admin.suratmasuk.index');
});
Route::get('/surat-masuk/create', function () {
    return view('pages.admin.suratmasuk.create');
});
Route::get('/profile', function () {
    return view('pages.admin.profile.index');
});
