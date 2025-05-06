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
}
