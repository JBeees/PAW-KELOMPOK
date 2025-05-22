<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;


class RegisterController extends Controller
{

    public function dataTempStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|confirmed'
        ]);

        $email = htmlspecialchars($request->input('email'));
        $password = Hash::make(htmlspecialchars($request->input('password')));
        session(['email' => $email, 'password' => $password]);
        return redirect()->route('next');
    }
    public function dataTempStore2(Request $request)
    {
        $email = session('email');
        $password = session('password');
        $cek = DB::table('school_account')->where('email', $email)->exists();
        if ($cek) {
            return redirect()->route('next')->withErrors(['email' => 'This email is already registered.']);
        }
        $pdo = DB::connection('mysql')->getPdo();
        $stmt = $pdo->prepare('INSERT INTO school_account (email, password) VALUES (:email, :password)');
        $stmt->execute(['email' => $email, 'password' => $password]);

        $stmt = $pdo->prepare('SELECT id FROM school_account where email =:email');
        $stmt->execute(['email' => $email]);
        $id = $stmt->fetchColumn();
        $request->validate([
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
        ]);
        $name = htmlspecialchars($request->input('name'));
        $phone = htmlspecialchars($request->input('phone'));
        $address = htmlspecialchars($request->input('address'));
        $student = htmlspecialchars($request->input('student'));
        $province = htmlspecialchars($request->input('province'));
        $provinces = Http::get('https://raw.githubusercontent.com/Caknoooo/provinces-cities-indonesia/main/json/provinces.json')
            ->json();
        $match = collect($provinces)
            ->firstWhere('id', (int) $province);
        $provinceName = $match['province'] ?? 'Unknown';
        $city = htmlspecialchars($request->input('city'));
        $stmt = $pdo->prepare(
            'INSERT INTO school_info 
               (id, name, phone_number, address, province, city, total_student) 
             VALUES 
               (:id, :name, :phone_number, :address, :province, :city, :total_student)'
        );
        $params = [
            'id' => $id,
            'name' => $name,
            'phone_number' => $phone,
            'address' => $address,
            'province' => $provinceName,
            'city' => $city,
            'total_student' => $student,
        ];
        $stmt->execute($params);
        return redirect()->route('login');
    }
}
