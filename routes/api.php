<?php

use App\Http\Controllers\ApiBusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::resource('/bus', ApiBusController::class);

Route::get("/bus",[ApiBusController::class,"index"]);
Route::post("bus/store",[ApiBusController::class,"store"]);
Route::put("bus/edit/{id}",[ApiBusController::class,"update"]);//ini belum bisa
Route::delete("bus/delete/{id}",[ApiBusController::class,"destroy"]);