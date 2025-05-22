<?php

namespace App\Http\Controllers;

use App\Models\FoodInfo;
use Illuminate\Http\Request;
use App\Models\Sekolah;

class ProvinceController extends Controller
{
    public function getData(Request $request)
    {
        $nama_provinsi = $request->query('name');
        $schoolIds = Sekolah::where('province', $nama_provinsi)->pluck('id');
        $total_porsi = FoodInfo::whereIn('id_sekolah', $schoolIds)->sum('jumlah_porsi') ?: 0;
        $bagus = FoodInfo::whereIn('id_sekolah', $schoolIds)->sum('kualitas_bagus') ?: 0;
        $persen = $total_porsi > 0
            ? round(($bagus / $total_porsi) * 100, 1)
            : 0;
        $total_prov = [
            'total_sekolah_prov' => count($schoolIds),
            'total_siswa_prov' => Sekolah::where('province', $nama_provinsi)->sum('total_student'),
            'total_porsi_prov' => $total_porsi,
            'persen' => $persen
        ];
        $schoolName = Sekolah::where('province', $nama_provinsi)->pluck('name');
        return response()->json([
            'total_prov' => $total_prov,
            'school' => $schoolName
        ]);
    }
    public function getDetailSchool(Request $request)
    {
        $nama_sekolah = $request->query('name');
        $sekolah = Sekolah::where('name', $nama_sekolah)->first();
        $id_sekolah = $sekolah->id;
        $address = $sekolah->address;
        $total_porsi = FoodInfo::where('id_sekolah', $id_sekolah)->sum('jumlah_porsi');
        $bagus = FoodInfo::where('id_sekolah', $id_sekolah)->sum('kualitas_bagus');
        $persen = $total_porsi > 0
            ? round(($bagus / $total_porsi) * 100, 1)
            : 0;
        $total_siswa = $sekolah->total_student;
        $dokum = FoodInfo::where('id_sekolah', $id_sekolah)->value('dokumentasi');
        $infoSekolah = ['address' => $address, 'total_porsi' => $bagus, 'total_siswa' => $total_siswa, 'dokum' => base64_encode($dokum), 'persen' => $persen];
        return response()->json([
            'infoSekolah' => $infoSekolah
        ]);
    }
}
