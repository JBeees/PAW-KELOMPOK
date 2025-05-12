<?php

namespace App\Http\Controllers;

use App\Models\FoodInfo;
use Illuminate\Http\Request;

class UploadMakananController extends Controller
{
    public function tambahMakanan(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'phone' => 'required|string',
            'time' => 'required|date_format:H:i',
            'date' => 'required|date',
            'porsi' => 'required|integer',
            'siswa' => 'required|integer',
            'bagus' => 'required|integer',
            'buruk' => 'required|integer',
            'catatan' => 'nullable|string',
            'dokum' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $file = $request->file('dokum');
        $binaryImage = file_get_contents($file->getRealPath());

        $insert = [
            'id_sekolah'=>session('id'),
            'nama_pengirim' => $data['nama'],
            'phone_number' => $data['phone'],
            'waktu' => $data['time'],
            'tanggal' => $data['date'],
            'jumlah_porsi' => $data['porsi'],
            'jumlah_siswa' => $data['siswa'],
            'kualitas_bagus' => $data['bagus'],
            'kualitas_buruk' => $data['buruk'],
            'catatan' => $data['catatan'] ?? null,
            'dokumentasi' => $binaryImage,
        ];
        FoodInfo::create($insert);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

}
