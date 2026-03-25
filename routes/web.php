<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
    });
});

Route::post('/authenticate', [AuthController::class, 'login'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'multirole:admin'])->group(function() {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/dasboard', 'dashboard')->name('admin.dashboard');
    });
});

Route::middleware(['auth', 'multirole:user'])->group(function() {
    Route::controller(UserController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
    });
});
