<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoLaporan;

class KontakController extends Controller
{
    public function uploadLaporan(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:info_laporan,email',
            'deskripsi' => 'required',
        ]);
        $info = new InfoLaporan();
        $info->tipe_laporan = $request->input('jenisLaporan');
        $info->email = $request->input('email');
        $info->deskripsi = $request->input('deskripsi');
        $info->save();
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
}
