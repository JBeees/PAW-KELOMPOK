<?php

namespace App\Http\Controllers;

use App\Models\FoodInfo;
use App\Models\Sekolah;
use App\Models\InfoLaporan;

class LaporanController extends Controller
{
    public function getAllData()
    {
        $siswaData = Sekolah::sum('total_student');
        $sekolahData = Sekolah::count('id');
        $total_porsi = FoodInfo::sum('jumlah_porsi') ?: 0;
        $bagus = FoodInfo::sum('kualitas_bagus') ?: 0;
        if ($total_porsi > 0) {
            $persen = round(($bagus / $total_porsi) * 100, 1);
        } else {
            $persen = 0;
        }
        $data = Sekolah::selectRaw(" YEAR(tanggal) AS year, MONTH(tanggal) AS month, SUM(total_student) AS siswa,COUNT(DISTINCT id) AS sekolah")
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        $dataPorsi = FoodInfo::selectRaw("YEAR(tanggal) AS year, MONTH(tanggal) AS month, SUM(jumlah_porsi) as porsi")
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        $temp = [];
        foreach ($data as $d) {
            $tahun = $d->year;
            $bulan = $d->month;
            $temp[$tahun][$bulan]['siswa'] = $d->siswa;
            $temp[$tahun][$bulan]['sekolah'] = $d->sekolah;
        }
        foreach ($dataPorsi as $d) {
            $tahun = $d->year;
            $bulan = $d->month;
            $temp[$tahun][$bulan]['porsi'] = $d->porsi;
        }
        $dataPerTahun = [];
        foreach ($temp as $tahun => $bulan) {
            $dataPerTahun[$tahun] = [
                'siswa' => [],
                'sekolah' => [],
                'porsi' => [],
            ];
            for ($i = 1; $i <= 12; $i++) {
                $dataPerTahun[$tahun]['siswa'][] = $bulan[$i]['siswa'] ?? 0;
                $dataPerTahun[$tahun]['sekolah'][] = $bulan[$i]['sekolah'] ?? 0;
                $dataPerTahun[$tahun]['porsi'][] = $bulan[$i]['porsi'] ?? 0;
            }
        }
        $response = [
            'totals' => [
                'siswa' => $siswaData,
                'sekolah' => $sekolahData,
                'persen' => $persen,
            ],
            'data' => $dataPerTahun,
        ];
        return response()->json($response);
    }
    public function rollerData()
    {
        $data = InfoLaporan::all();
        return view('laporan', compact('data'));
    }
}
