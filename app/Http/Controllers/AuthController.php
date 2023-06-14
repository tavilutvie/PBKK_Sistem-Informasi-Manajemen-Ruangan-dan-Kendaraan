<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Register user (POST Method)
     */
    public function register(Request $request) {
        $validated_user = $request->validate([
            'name' => 'required|max:255|unique:users|min:4|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        $validated_akun = $request->validate([
            'nama_belakang' => 'required|max:255',
            'nama_depan' => 'required|max:255',
            'nomor_telepon' => 'required|unique:Akuns|max:20',
            'nip' => 'required|unique:Akuns|min:10|max:20',
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

        // change image to path
        $validated_akun['foto_tanda_pengenal'] = $imagePath;

        $validated_user['password'] = Hash::make($validated_user['password']);

        // Save Data
        User::create($validated_user)
            ->akun()
            ->create($validated_akun);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    /**
     * Login user (POST Method)
     */
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validated)) {
            return redirect('/')->with('success', 'Login successful!');
        }

        return redirect('/login')->with('error', 'Login failed!');
    }

    /**
     * Logout user (POST Method)
     */
    public function logout() {
        auth()->logout();
        return redirect('/login')->with('success', 'Logout successful!');
    }
}
