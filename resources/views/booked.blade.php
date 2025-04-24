@extends('layout')

@section('title', 'Data Penumpang - VoyageRide')

@section('content')
<div class="main-content">
    <div class="booking-card">
        <div class="booking-header">
            <h2>Data Penumpang</h2>
        </div>
        
        <div class="booking-content">
            <div class="journey-summary">
                <p><strong>Bus:</strong> {{ $busName }} | <strong>Rute:</strong> {{ $origin }} ke {{ $destination }} | <strong>Keberangkatan:</strong> {{ \Carbon\Carbon::parse($departureTime)->format('d M Y, H:i') }}</p>
            </div>

            <form action="{{ route('processBooking') }}" method="POST">
                @csrf

                @foreach ($selectedSeats as $index => $seat)
                    <div class="passenger-form">
                        <h3 class="section-title">Penumpang {{ $index + 1 }} (Kursi {{ $seat }})</h3>
                        <input type="hidden" name="passengers[{{ $index }}][seat]" value="{{ $seat }}">

                        <div class="form-group">
                            <label>Nama Lengkap:</label>
                            <input type="text" name="passengers[{{ $index }}][name]" required>
                        </div>

                        <div class="form-group">
                            <label>Nomor Telepon:</label>
                            <input type="text" name="passengers[{{ $index }}][phone]" required>
                        </div>

                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="passengers[{{ $index }}][email]" required>
                        </div>
                    </div>
                @endforeach

                <!-- Hidden info to send along -->
                <input type="hidden" name="bus_name" value="{{ $busName }}">
                <input type="hidden" name="origin" value="{{ $origin }}">
                <input type="hidden" name="destination" value="{{ $destination }}">
                <input type="hidden" name="departure_time" value="{{ $departureTime }}">
                <input type="hidden" name="price" value="{{ $price }}">

                <div class="price-summary">
                    <p class="price-label">Total Harga ({{ count($selectedSeats) }} kursi):</p>
                    <p class="price-value">Rp {{ number_format($price * count($selectedSeats), 0, ',', '.') }}</p>
                </div>

                <button type="submit" class="booking-button">Lanjutkan ke Pembayaran</button>
            </form>
        </div>
    </div>
</div>

<style>
/* Main Layout Styles */
/* Main Layout Styles */
.main-content {
    padding: 20px;
    font-family: 'Roboto', sans-serif;
}

.booking-card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.booking-header {
    background-color: #006064;
    color: white;
    padding: 15px;
}

.booking-header h2 {
    margin: 0;
    font-size: 1.5rem;
}

.booking-content {
    padding: 20px;
}

/* Journey Summary */
.journey-summary {
    background-color: #f5f5f5;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.journey-summary p {
    margin: 0;
}

/* Section Titles */
.section-title {
    color: #006064;
    margin-bottom: 8px;
    font-size: 1.1rem;
}

/* Passenger Form */
.passenger-form {
    background: #f9f9f9;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Price Summary */
.price-summary {
    margin: 20px 0;
}

.price-label {
    margin-bottom: 5px;
    color: #555;
}

.price-value {
    font-size: 1.2em;
    font-weight: bold;
    color: #D50000;
    margin: 0;
}

/* Booking Button */
.booking-button {
    background-color: #006064;
    color: white;
    border: none;
    padding: 12px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
}

.booking-button:hover {
    background-color: #00838f;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .booking-content {
        padding: 15px;
    }
}

</style>

<!-- Google Roboto Font -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
@endsection