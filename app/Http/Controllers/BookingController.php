<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\Passenger;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
    
class BookingController extends Controller
{
    public function showBookingForm()
    {
        // Redirect to login if not authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        
        // If accessed directly without data, redirect to landing page
        return redirect()->route('landing')->with('error', 'Silakan pilih bus terlebih dahulu');
    }

    /**
     * Menyimpan kursi yang dipilih dan menampilkan form data penumpang.
     */
    public function booked(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|integer', // Change to require bus_id
            'name' => 'required|string',
            'origin' => 'required',
            'destination' => 'required',
            'departure_time' => 'required',
            'price' => 'required|numeric',
            'selected_seats' => 'required|string',
        ]);

        $selectedSeats = explode(',', $request->selected_seats);

        return view('passenger_form', [
            'busId' => $request->bus_id, // Pass the bus_id
            'busName' => $request->name,
            'origin' => $request->origin,
            'destination' => $request->destination,
            'departureTime' => $request->departure_time,
            'price' => $request->price,
            'selectedSeats' => $selectedSeats,
        ]);
    }

    /**
     * Handler for direct access to the process booking route
     */
    public function handleDirectAccess()
    {
        return redirect()->route('landing')->with('error', 'Silakan pilih bus dan kursi terlebih dahulu');
    }

    /**
     * Memproses data penumpang dan menampilkan halaman pembayaran.
     */
    public function processBooking(Request $request)
    {
        // Force debug - Log all request info
        Log::info('Process Booking Request', [
            'method' => $request->method(),
            'data' => $request->all(),
            'session' => $request->session()->all(),
            'route' => $request->route()->getName(),
            'url' => $request->url(),
        ]);

        try {
            $request->validate([
                'passengers' => 'required|array',
                'passengers.*.name' => 'required|string',
                'passengers.*.NIK' => 'required|string', // Removed size:16 constraint
                'passengers.*.seat' => 'required',
                'bus_id' => 'required|integer', // Use bus_id instead of bus_name
                'origin' => 'required',
                'destination' => 'required',
                'departure_time' => 'required',
                'price' => 'required|numeric',
            ]);

            // Use the exact bus_id from the request
            $busId = $request->bus_id;
            
            // Create booking with the direct bus_id
            $booking = new Booking();
            $booking->user_id = Auth::id();
            $booking->bus_id = $busId; // Use the direct bus ID
            $booking->booking_number = $this->generateBookingNumber();
            $booking->booking_date = now();
            $booking->total_seats = count($request->passengers);
            $booking->total_price = $request->price * count($request->passengers);
            $booking->tax_amount = $booking->total_price * 0.04;
            $booking->grand_total = $booking->total_price + $booking->tax_amount;
            $booking->status = 'pending';
            $booking->payment_deadline = now()->addMinutes(10);
            $booking->save();

            Log::info('Booking created', ['booking_id' => $booking->id, 'bus_id' => $busId]);

            // Create passenger records
            foreach ($request->passengers as $passengerData) {
                Passenger::create([
                    'booking_id' => $booking->id,
                    'name' => $passengerData['name'],
                    'nik' => $passengerData['NIK'],
                    'seat_number' => $passengerData['seat'],
                ]);
            }

            // Store critical data in session as backup
            $request->session()->put('active_booking_id', $booking->id);
            
            // Return payment view with all necessary data
            return view('payment', [
                'booking' => $booking,
                'booking_id' => $booking->id, // Explicitly pass booking ID
                'passengers' => $request->passengers,
                'totalPrice' => $booking->total_price,
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error in process booking', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Fallback booking number generator if model method is unavailable
     */
    private function generateBookingNumber()
    {
        return 'BK' . now()->format('YmdHis') . rand(1000, 9999);
    }

    /**
     * Memproses pembayaran.
     */
    public function processPayment(Request $request)
    {
        Log::info('Payment processing request', ['data' => $request->all()]);
        
        $request->validate([
            'payment_method' => 'required|string',
        ]);

        // Try to get booking_id from request, or fallback to session
        $bookingId = $request->booking_id ?? $request->session()->get('active_booking_id');
        
        if (!$bookingId) {
            Log::error('No booking ID found in payment processing');
            return redirect()->route('landing')->with('error', 'Data pemesanan tidak ditemukan');
        }

        $booking = Booking::findOrFail($bookingId);

        if (Carbon::now()->isAfter($booking->payment_deadline)) {
            $booking->status = 'cancelled';
            $booking->save();
            return redirect()->route('landing')->with('error', 'Waktu pembayaran telah habis');
        }

        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_method = $request->payment_method;
        $payment->amount = $booking->grand_total;
        $payment->status = 'pending';

        $prefix = match ($request->payment_method) {
            'Virtual Account' => 'VA-',
            'GoPay' => 'GP-',
            'Indomaret' => 'IM-',
            'Alfamart' => 'AF-',
            'Credit Card' => 'CC-',
            'Manual Transfer' => 'MT-',
            default => 'PM-',
        };

        $payment->transaction_id = $prefix . rand(10000000, 99999999);
        $payment->save();

        // Simulasi pembayaran berhasil
        $payment->status = 'paid';
        $payment->payment_date = now();
        $payment->save();

        $booking->status = 'confirmed';
        $booking->save();

        // Clear session booking ID
        $request->session()->forget('active_booking_id');

        return view('booking_confirmation', [
            'booking' => $booking,
            'payment' => $payment
        ]);
    }

    public function showConfirmation($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $payment = Payment::where('booking_id', $bookingId)->first();

        return view('konfirmasi', compact('booking', 'payment'));
    }

    public function bookingHistory()
{
    $user = Auth::user();

    // Ambil semua booking user
    $bookings = Booking::with('passengers')
        ->where('user_id', $user->id)
        ->orderByDesc('created_at')
        ->get();

    // Update status jika payment_deadline sudah lewat
    foreach ($bookings as $booking) {
        if ($booking->status === 'pending' && Carbon::now()->isAfter($booking->payment_deadline)) {
            $booking->status = 'cancelled';
            $booking->save();
        }
    }

    return view('booking', compact('bookings'));
}

    public function cancelBooking(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== 'cancelled') {
            $booking->status = 'cancelled';
            $booking->save();

            // Bebaskan kursi
            foreach ($booking->seats as $seat) {
                $seat->is_booked = false;
                $seat->save();
            }
        }

        return response()->json(['message' => 'Booking cancelled']);
    }

    public function retryPayment($id)
    {
        $booking = Booking::with('passengers')->findOrFail($id);
        
        // Check if user owns this booking
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('booking.history')->with('error', 'Anda tidak memiliki akses ke pemesanan ini');
        }
        
        // Reset booking status to pending
        if ($booking->status == 'cancelled') {
            return redirect()->route('booking.history')->with('error', 'Pemesanan ini sudah dibatalkan dan tidak bisa dibayar lagi.');
        }
        
        
        // Set new payment deadline
        $booking->payment_deadline = now()->addMinutes(10);
        $booking->save();
        
        // Get passenger data for payment view
        $passengers = [];
        foreach ($booking->passengers as $passenger) {
            $passengers[] = [
                'name' => $passenger->name,
                'seat' => $passenger->seat_number,
                'NIK' => $passenger->nik
            ];
        }
        
        // Set deadline for view
        $deadline = Carbon::now()->addMinutes(10);
        
        // Return payment view with necessary data
        return view('payment', [
            'booking' => $booking,
            'booking_id' => $booking->id,
            'passengers' => $passengers,
            'totalPrice' => $booking->total_price,
            'deadline' => $deadline
        ]);
    }
    
    /**
     * Generate and display e-ticket for confirmed bookings
     */
    public function generateETicket($id)
    {
        $booking = Booking::with(['passengers', 'bus', 'payment'])->findOrFail($id);
        
        // Check if user owns this booking
        if ($booking->user_id != Auth::id()) {
            return redirect()->route('booking.history')->with('error', 'Anda tidak memiliki akses ke pemesanan ini');
        }
        
        // Check if booking is confirmed (paid)
        if ($booking->status != 'confirmed') {
            return redirect()->route('booking.history')
                ->with('error', 'E-Ticket hanya tersedia untuk pemesanan yang sudah dikonfirmasi');
        }
        
        return view('e_ticket', [
            'booking' => $booking
        ]);
    }

}