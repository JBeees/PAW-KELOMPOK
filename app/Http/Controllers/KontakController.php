<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'jenisLaporan' => 'required',
            'email' => 'required|email',
            'deskripsi' => 'required'
        ]);
        $jenisLaporan = $request->input('jenisLaporan');
        $email = $request->input('email');
        $deskripsi = $request->input('deskripsi');

        $to = $email;
        $subject = "Testing " . $jenisLaporan;
        $body = "Deskripsi Masalah\n" . $deskripsi;

        $headers = "From: no-reply@yourdomain.com";
        $cek = mail($to, $subject, $body, $headers);
        if ($cek) {
            return redirect()->route('kontak');
        } else {
            return back()->withErrors(['error' => 'Trouble Detected']);
        }
    }
}
