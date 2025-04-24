<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CityController;

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

Route::get('/admin/landingadmin', [AdminController::class, 'index'])->name('/admin/landingadmin');

// Tambah Admin
Route::get('/admin/add-admin', [AdminController::class, 'showAddAdmin'])->name('/admin/admin.add');
Route::post('/admin/add-admin', [AdminController::class, 'storeAdmin'])->name('admin.store');

//Tambah Bus
Route::get('/admin/bus.add', [BusController::class, 'create'])->name('/admin/bus.add');
Route::post('/admin/bus.store', [BusController::class, 'store'])->name('bus.store');
Route::post('/bus/store', [BusController::class, 'store'])->name('bus.store');

//Delete Bus
Route::delete('/admin/bus/{id}', [BusController::class, 'destroy'])->name('bus.delete');


//Tambah Kota
Route::get('/admin/add_cities', [CityController::class, 'create'])->name('/admin/add_cities');
Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities', [CityController::class, 'store'])->name('cities.store');

Route::get('/admin/bus-table', [BusController::class, 'list'])->name('/admin/bus-table');


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


Route::get('/search', [BusController::class, 'search'])->name('search');


Route::get('/landing', [BusController::class, 'index'])->name('landing');
Route::get('/search', [BusController::class, 'search'])->name('search');
Route::get('/bus/details/{id}', [BusController::class, 'details'])->name('bus.details');
Route::get('/booking', [BusController::class, 'booking'])->name('booking');

Route::post('/booked', [BookingController::class, 'store'])->name('booked');
Route::post('/process-booking', [BookingController::class, 'store'])->name('processBooking');
