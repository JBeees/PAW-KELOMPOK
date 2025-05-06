<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodInfo;
use App\Models\Sekolah;

class HistoryController extends Controller
{
    public function showDetail($id)
    {
        $id_sekolah = session('id');
        $sekolah = Sekolah::find($id_sekolah);
        $food = FoodInfo::where('id_makanan', $id)->first();
        $percentAccept = round(($food->kualitas_bagus / $food->jumlah_siswa) * 100, 1);
        return view('historyDetailInfo', compact('food', 'sekolah', 'percentAccept'));
    }
    public function deleteData($id)
    {
        FoodInfo::where('id_makanan', $id)->first()->delete();
        return redirect()->route('historyDashboard')->with('success', 'Data berhasil dihapus!');
    }
}
