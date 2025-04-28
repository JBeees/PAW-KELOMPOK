<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/peta-penyebaran', function () {
    return view('petapenyebaran');
})->name('peta.penyebaran');
Route::get('/laporan', function () {
    return view('laporan');
})->name('laporan');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
