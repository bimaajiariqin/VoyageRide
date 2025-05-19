<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BusController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman login dan register
Route::get('/', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('logincontroller');

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Admin routes
Route::get('/admin/landingadmin', [AdminController::class, 'index'])->name('/admin/landingadmin');
Route::get('/admin/add-admin', [AdminController::class, 'showAddAdmin'])->name('/admin/admin.add');
Route::post('/admin/add-admin', [AdminController::class, 'storeAdmin'])->name('admin.store');
Route::get('/admin/bus.add', [BusController::class, 'create'])->name('/admin/bus.add');
Route::post('/admin/bus.store', [BusController::class, 'store'])->name('bus.store');
Route::post('/bus/store', [BusController::class, 'store'])->name('bus.store');
Route::delete('/admin/bus/{id}', [BusController::class, 'destroy'])->name('bus.delete');
Route::get('/admin/add_cities', [CityController::class, 'create'])->name('/admin/add_cities');
Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
Route::get('/admin/bus-table', [BusController::class, 'list'])->name('/admin/bus-table');

// Routes after login
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
    
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');
    
    // Landing & Bus routes
    Route::get('/landing', [BusController::class, 'index'])->name('landing');
    Route::get('/search', [BusController::class, 'search'])->name('search');
    Route::get('/bus/details/{id}', [BusController::class, 'details'])->name('bus.details');
    
    // IMPORTANT: Booking Process Routes
    // Step 1: Initial booking with seat selection
    Route::post('/booked', [BookingController::class, 'booked'])->name('booked');
    
    // Step 2: Process passenger data and show payment
    Route::post('/process-booking', [BookingController::class, 'processBooking'])->name('processBooking');
    Route::get('/process-booking', [BookingController::class, 'handleDirectAccess'])->name('processBooking.direct');
    
    // Step 3: Process payment
    Route::post('/payment/process', [BookingController::class, 'processPayment'])->name('payment.process');
    
    // Booking history and management
    Route::get('/booking/history', [BookingController::class, 'bookingHistory'])->name('booking.history');
    Route::get('/booking/{id}/detail', [BookingController::class, 'bookingDetail'])->name('booking.detail');
    Route::get('/booking/{id}/ticket', [BookingController::class, 'downloadTicket'])->name('booking.ticket');
    Route::get('/booking/{id}/cancel', [BookingController::class, 'cancelBooking'])->name('booking.cancel');
});

// Admin booking management routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/bookings', [BookingController::class, 'adminBookingList'])->name('admin.bookings');
    Route::get('/bookings/{id}', [BookingController::class, 'adminBookingDetail'])->name('admin.booking.detail');
    Route::post('/bookings/{id}/status', [BookingController::class, 'adminUpdateBookingStatus'])->name('admin.booking.status');
});

Route::get('/booking', function() {
    return redirect()->route('booking.history');
})->name('booking');

Route::post('/cancel-booking/{id}', [BookingController::class, 'cancelBooking']);


