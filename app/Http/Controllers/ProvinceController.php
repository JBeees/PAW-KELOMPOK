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
        $total_prov = [
            'total_sekolah_prov' => count($schoolIds),
            'total_siswa_prov' => Sekolah::where('province', $nama_provinsi)->sum('total_student'),
            'total_porsi_prov' => FoodInfo::whereIn('id_sekolah', $schoolIds)->sum('jumlah_porsi'),
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
        $total_siswa = $sekolah->total_student;
        $dokum = FoodInfo::where('id_sekolah', $id_sekolah)->value('dokumentasi');
        $infoSekolah = ['address' => $address, 'total_porsi' => $total_porsi, 'total_siswa' => $total_siswa,'dokum'=>base64_encode($dokum)];
        return response()->json([
            'infoSekolah' => $infoSekolah
        ]);
    }
}
