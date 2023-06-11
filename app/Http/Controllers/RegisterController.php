<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
