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
    public function getHistoryData()
    {
        $total_porsi = FoodInfo::where('id_sekolah', session('id'))->sum('jumlah_porsi');
        $bagus = FoodInfo::where('id_sekolah', session('id'))->sum('kualitas_bagus');
        $persen = round(($bagus / $total_porsi) * 100, 1);
        return response()->json(['total_porsi' => $total_porsi, 'persen' => $persen]);
    }
    public function updateData($id, Request $request)
    {
        $food = FoodInfo::where('id_makanan', $id)->first();
        $food->nama_pengirim = $request->filled('nama') ? htmlspecialchars($request->input('nama')) : $food->nama_pengirim;
        $food->phone_number = $request->filled('phone') ? htmlspecialchars($request->input('phone')) : $food->phone_number;
        $food->jumlah_porsi = $request->filled('porsi') ? htmlspecialchars($request->input('porsi')) : $food->jumlah_porsi;
        $food->kualitas_bagus = $request->filled('good') ? htmlspecialchars($request->input('good')) : $food->kualitas_bagus;
        $food->kualitas_buruk = $request->filled('bad') ? htmlspecialchars($request->input('bad')) : $food->kualitas_buruk;
        $food->catatan = $request->filled('note') ? htmlspecialchars($request->input('note')) : $food->catatan;
        $food->save();
        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }
}
