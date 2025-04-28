<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
{
    $selectedSeats = explode(',', $request->input('selected_seats'));
    $busName = $request->input('name');
    $origin = $request->input('origin');
    $destination = $request->input('destination');
    $departureTime = $request->input('departure_time');
    $price = $request->input('price');

    return view('booked', [
        'selectedSeats' => $selectedSeats,
        'busName' => $busName,
        'origin' => $origin,
        'destination' => $destination,
        'departureTime' => $departureTime,
        'price' => $price
    ]);
}


public function processBooking(Request $request)
{
    $passengers = $request->input('passengers');
    $price = $request->input('price'); // Harga per kursi

    $totalPrice = count($passengers) * $price;

    return view('booking_confirmation', compact('passengers', 'totalPrice'));
}


}
