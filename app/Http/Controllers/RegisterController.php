<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'nama_belakang' => 'required|max:255',
            'nama_depan' => 'required|max:255',
            'username' => 'required|unique:akuns|min:4|max:255',
            'email' => 'required|email|unique:akuns|max:255',
            'password' => 'required|min:8|max:255',
            'nomor_telepon' => 'required|unique:akuns|max:20',
            'nip' => 'required|unique:akuns|max:255',
            'jabatan' => 'required|max:255',
            'foto_tanda_pengenal' => 'required|image'
        ]);

        $imagePath = "";
        if ($request->hasFile('foto_tanda_pengenal')) {
            $image = $request->file('foto_tanda_pengenal');
            $filename = time(). '-'. str_replace(' ', '_', $image->getClientOriginalName());
            $image->storeAs('public/images/user_profile', $filename);

            // Get the image path
            $imagePath = 'storage/images/user_profile/' . $filename;
        }


        return redirect()->back();
    }
}
