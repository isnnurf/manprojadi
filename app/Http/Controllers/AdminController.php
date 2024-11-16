<?php

// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Logika untuk menampilkan data dashboard admin
        return view('admin.dashboard'); // Pastikan ada file view 'admin.dashboard'
    }
}

