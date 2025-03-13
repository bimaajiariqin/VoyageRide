<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use Carbon\Carbon;

class BusController extends Controller
{
    /**
     * Display the landing page
     */
    public function index()
    {
        return view('landing');
    }

    /**
     * Search for buses
     */
    public function search(Request $request)
    {
        // Validate input
        $request->validate([
            'dari' => 'required|string',
            'ke' => 'required|string',
            'tanggal_pergi' => 'required|date',
        ]);

        // Get buses that match the criteria
        $buses = Bus::where('origin', $request->dari)
                    ->where('destination', $request->ke)
                    ->whereDate('departure_time', $request->tanggal_pergi)
                    ->get();

        // Pass data to view
        return view('search', [
            'buses' => $buses,
            'total_buses' => $buses->count(),
            'kota_asal' => $request->dari,
            'kota_tujuan' => $request->ke,
            'tanggal_pergi' => $request->tanggal_pergi,
        ]);
    }

    /**
     * Show bus details
     */
    public function details($id)
    {
        $bus = Bus::findOrFail($id);
        return view('bus_details', ['bus' => $bus]);
    }

    /**
     * Show booking page
     */
    public function booking()
    {
        return view('booking');
    }
    
    
}