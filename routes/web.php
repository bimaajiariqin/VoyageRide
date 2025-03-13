<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BusController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman login dan register
Route::get('/', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('logincontroller');

Route::get('/register', [LoginController::class, 'showRegister'])->name('register');
Route::post('/register', [LoginController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
});

// Halaman utama setelah login
Route::get('/landing', function () {
    return view('landing');
})->middleware('auth')->name('landing');

//Halaman Register
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/landing', [BusController::class, 'index'])->name('landing');
Route::get('/search', [BusController::class, 'search'])->name('search');
Route::get('/bus/details/{id}', [BusController::class, 'details'])->name('bus.details');
Route::get('/booking', [BusController::class, 'booking'])->name('booking');

