<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Halaman utama (landing page)
Route::middleware([])->get('/', function () {
    return Inertia::render('HomeView'); // Rute ini merender komponen HomeView
})->name('home');

//halaman login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login'); // Halaman login
Route::post('/login', [AuthenticatedSessionController::class, 'store']); // Proses login

// Halaman menu
Route::get('/menu', function () {
    return Inertia::render('MenuView'); // Rute ini merender komponen MenuView
})->name('menu');

// Halaman tentang
Route::get('/about', function () {
    return Inertia::render('AboutView'); // Rute ini merender komponen AboutView
})->name('about');

// Halaman kontak
Route::get('/contact', function () {
    return Inertia::render('ContactView'); // Rute ini merender komponen AboutView
})->name('contact');


// Rute untuk logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');

// Profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
