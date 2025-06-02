<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class ApiBusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus = Bus::all();
        return response()->json($bus);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bus_type' => 'required',
            'seat_capacity' => 'required|integer',
            'bus_number' => 'required',
            'model' => 'required',
            'origin_id' => 'required|exists:cities,id',
            'destination_id' => 'required|exists:cities,id',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|numeric',
        ]);
    
        $bus = Bus::create([
            'name' => $request->name,
            'bus_type' => $request->bus_type,
            'seat_capacity' => $request->seat_capacity,
            'bus_number' => $request->bus_number,
            'model' => $request->model,
            'logo_url' => $request->logo_url,
            'origin_id' => $request->origin_id,
            'destination_id' => $request->destination_id,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time,
            'price' => $request->price,
            'has_luggage' => $request->has('has_luggage'),
            'has_light' => $request->has('has_light'),
            'has_ac' => $request->has('has_ac'),
            'has_drink' => $request->has('has_drink'),
            'has_wifi' => $request->has('has_wifi'),
            'has_usb' => $request->has('has_usb'),
            'has_cctv' => $request->has('has_cctv'),
        ]);
    
        return response()->json($bus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
        'name' => '',
        'bus_type' => '',
        'seat_capacity' => '|integer',
        'bus_number' => '',
        'model' => '',
        'origin_id' => '|exists:cities,id',
        'destination_id' => '|exists:cities,id',
        'departure_time' => '|date',
        'arrival_time' => '|date',
        'price' => '|numeric',
    ]);

    $bus = Bus::findOrFail($id);

    $bus->update([
        'name' => $request->name,
        'bus_type' => $request->bus_type,
        'seat_capacity' => $request->seat_capacity,
        'bus_number' => $request->bus_number,
        'model' => $request->model,
        'logo_url' => $request->logo_url,
        'origin_id' => $request->origin_id,
        'destination_id' => $request->destination_id,
        'departure_time' => $request->departure_time,
        'arrival_time' => $request->arrival_time,
        'price' => $request->price,
        'has_luggage' => $request->has('has_luggage'),
        'has_light' => $request->has('has_light'),
        'has_ac' => $request->has('has_ac'),
        'has_drink' => $request->has('has_drink'),
        'has_wifi' => $request->has('has_wifi'),
        'has_usb' => $request->has('has_usb'),
        'has_cctv' => $request->has('has_cctv'),
    ]);

    return response()->json([
        'message' => 'Successfully',
        'data' => $bus
    ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bus = Bus::findOrFail($id);
            $bus->delete();

            return response()->json([
                'message' => 'success'
            ], 200);
    }
}
