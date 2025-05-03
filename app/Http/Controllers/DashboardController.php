<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sekolah;
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
}
