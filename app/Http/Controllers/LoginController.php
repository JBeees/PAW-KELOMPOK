<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;
class LoginController extends Controller
{
    public function showProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        $email = htmlspecialchars($request->input('email'));
        $pass = htmlspecialchars($request->input('password'));
        $cekEmail = DB::table('school_account')->where('email', $email)->first();
        if (!$cekEmail) {
            return back()->withErrors(['email' => 'Email not registered']);
        }
        if (Hash::check($pass, $cekEmail->password)) {
            session(['id' => $cekEmail->id]);
            session(['email' => $cekEmail->email]);
            return redirect()->route('loggedIn');
        } else {
            return back()->withErrors(['password' => 'Incorrect password']);
        }
    }
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}
