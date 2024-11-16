<?php
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route untuk login dan logout admin di API
// Route::post('/admin/login', action: action: [AuthController::class, 'login']);
Route::post('admin/logout', [AuthController::class, 'logout'])->middleware('auth:admin');
