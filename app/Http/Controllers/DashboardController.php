<?php

namespace App\Http\Controllers;

use App\Models\FoodInfo;
use Illuminate\Http\Request;
use App\Models\Sekolah;
use App\Models\Akun;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $storedImage = $request->file('profile_image');
        $binaryImage = file_get_contents($storedImage->getRealPath());
        $mark = Sekolah::find(session('id'));
        $mark->profile_image = $binaryImage;
        $mark->save();
        return redirect()->route('loggedIn');
    }
    public function updateData(Request $request)
    {
        $id = session('id');
        $sekolah = Sekolah::find($id);
        $sekolah->phone_number = $request->filled('phone') ? htmlspecialchars($request->input('phone')) : $sekolah->phone_number;
        $sekolah->address = $request->filled('address') ? htmlspecialchars($request->input('address')) : $sekolah->address;
        $sekolah->province = $request->filled('province') ? htmlspecialchars($request->input('province')) : $sekolah->province;
        $sekolah->city = $request->filled('city') ? htmlspecialchars($request->input('city')) : $sekolah->city;
        $sekolah->save();
        return redirect()->back()->with('success', 'Data berhasil diubah!');
    }
    public function deleteAccount(Request $request)
    {
        Akun::where('id', session('id'))->delete();
        Sekolah::where('id', session('id'))->delete();
        FoodInfo::where('id_sekolah', session('id'))->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
