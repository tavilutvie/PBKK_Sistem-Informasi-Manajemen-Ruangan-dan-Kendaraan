<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
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

    /**
     * Login to the application.
     */
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validated)) {
            if (auth()->user()->akun->is_admin) {
                return redirect('/admin')->with('success', 'Login successful!');
            } else {
                return redirect('/dashboard')->with('success', 'Login successful!');
            }
        }

        return redirect('/login')->with('error', 'Login failed!');
    }

    /**
     * Logout from the application.
     */
    public function logout()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logout successful!');
    }
}
