<?php

// app/Http/Controllers/AuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Coba login dengan menggunakan Auth default (tanpa guard)
    if (Auth::attempt($request->only('email', 'password'))) {
        // Jika berhasil login
        return response()->json(['message' => 'Login successful'], 200);
    }

    // Jika login gagal
    return response()->json(['message' => 'Invalid credentials'], 401);
}


    public function logout()
    {
        Auth::guard('admin')->logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}

