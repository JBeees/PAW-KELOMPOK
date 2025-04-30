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
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/registrasi', function () {
    return view('registrasi');
})->name('registrasi');
Route::get('/dashboardIn', function () {
    return view('loggedInDashboard');
})->name('loggedIn');
Route::get('/history', function () {
    return view('historyDashboard');
})->name('historyDashboard');
Route::get('/upload', function () {
    return view('uploadDashboard');
})->name('uploadDashboard');
Route::get('/testing', function () {
    return view('testing');
});
Route::get('/nextRegister', function () {
    return view('nextRegistrasi');
})->name('next');;

