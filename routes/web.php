<?php

use App\Models\FoodInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadMakananController;
use App\Http\Controllers\HistoryController;
use App\Models\Sekolah;


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
    $id = session('id');
    $sekolah = Sekolah::find($id);
    return view('loggedInDashboard', compact('sekolah'));
})->name('loggedIn');
Route::get('/history', function () {
    $id = session('id');
    $sekolah = Sekolah::find($id);
    $food = FoodInfo::where('id_sekolah', $id)->get();
    return view('historyListInfo', compact('sekolah', 'food'));
})->name('historyDashboard');
Route::get('/upload', function () {
    $id = session('id');
    $sekolah = Sekolah::find($id);
    return view('uploadDashboard', compact('sekolah'));
})->name('uploadDashboard');
Route::get('/testing', function () {
    return view('testing');
});
Route::get('/register/second', function () {
    return view('nextRegistrasi');
})->name('next');
Route::post('/register/second', [RegisterController::class, 'dataTempStore'])->name('temp-store');
Route::post('/login', [RegisterController::class, 'dataTempStore2'])->name('temp-store2');
Route::post('/dashboardIn', [LoginController::class, 'showProfile'])->name('login-check');
Route::post('/dashboardInUpdate', [DashboardController::class, 'updateProfileImage'])->name('update-profile');
Route::put('/dashboard/update-data', [DashboardController::class, 'updateData'])->name('updateData');
Route::post('/upload/tambah-makanan', [UploadMakananController::class, 'tambahMakanan'])->name('tambah-makanan');
Route::get('/history/detail-info/{id}', [HistoryController::class, 'showDetail'])->name('detail-info');



