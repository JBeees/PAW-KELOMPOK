<?php

use App\Http\Controllers\KontakController;
use App\Models\FoodInfo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UploadMakananController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\LaporanController;
use App\Models\Sekolah;


Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/peta-penyebaran', function () {
    $total_porsi = FoodInfo::sum('jumlah_porsi');
    $bagus = FoodInfo::sum('kualitas_bagus');
    $persen = round(($bagus / $total_porsi) * 100, 1);
    $total_id = ['total_sekolah_id' => Sekolah::count(), 'total_siswa_id' => Sekolah::sum('total_student'), 'total_porsi_id' => $total_porsi, 'persen' => $persen];
    return view('petapenyebaran', compact('total_id'));
})->name('peta.penyebaran');
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');
Route::get('/laporan', [LaporanController::class, 'rollerData'])->name('laporan');
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
Route::delete('/history/delete-data/{id}', [HistoryController::class, 'deleteData'])->name('delete-data');
Route::get('/api/province-data', [ProvinceController::class, 'getData']);
Route::get('/api/school-data', [ProvinceController::class, 'getDetailSchool']);
Route::get('/api/all-data', [LaporanController::class, 'getAllData']);
Route::get('/api/history-data', [HistoryController::class, 'getHistoryData']);
Route::put('/history/update-food-data/{id}', [HistoryController::class, 'updateData'])->name('updateFoodData');
Route::post('/kontak/upload', [KontakController::class, 'uploadLaporan'])->name('uploadLaporan');
Route::delete('/delete-account', [DashboardController::class, 'deleteAccount'])->name('deleteAccount');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






