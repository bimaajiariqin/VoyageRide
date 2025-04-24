<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Bus;
    use App\Models\City;

    use Carbon\Carbon;

    class BusController extends Controller
    {
        /**
         * Display the landing page
         */
        public function index()
        {
            $cities = City::all();
            return view('landing', compact('cities'));
        }


        public function list() {
            $buses = Bus::all(); // Ambil semua data bus dari database
            return view('/admin/bus-table', compact('buses'));
        }

        public function create()
        {
            $cities = City::all();
            return view('admin.tambah-bus', compact('cities'));
        }

        public function destroy($id)
        {
            $bus = Bus::findOrFail($id);
            $bus->delete();

            return redirect()->back()->with('success', 'Bus berhasil dihapus.');
        }

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

    return redirect()->back()->with('success', 'Bus berhasil ditambahkan!');
}


        

        /**
         * Search for buses
         */




         public function search(Request $request)
         {
             $request->validate([
                 'dari' => 'required|string',
                 'ke' => 'required|string',
                 'tanggal_pergi' => 'required|date'
             ]);
         
             $origin = City::where('name', $request->dari)->firstOrFail();
             $destination = City::where('name', $request->ke)->firstOrFail();
         
             $buses = Bus::with(['origin', 'destination'])
                 ->where('origin_id', $origin->id)
                 ->where('destination_id', $destination->id)
                 ->whereDate('departure_time', $request->tanggal_pergi)
                 ->get();
         
                 return view('search', [
                    'buses' => $buses,
                    'kota_tujuan' => $request->ke,
                    'tanggal_pergi' => $request->tanggal_pergi,
                    'total_buses' => $buses->count()
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