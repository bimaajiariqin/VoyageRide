    @extends('layout')

    @section('title', $bus->name . ' - Detail Bus - VoyageRide')

    @section('content')
    <div class="main-content">
        <div class="bus-detail-card">
            <div class="bus-header">
                <h2>{{ $bus->name }} - {{ $bus->bus_type }}</h2>
            </div>
            
            <div class="bus-content">
                <div class="info-section">
                    <div class="bus-basic-info">
                        <img src="{{ asset($bus->logo_url) }}" alt="{{ $bus->name }}" class="bus-logo">
                        
                        <h3 class="section-title">Informasi Bus</h3>
                        <table class="info-table">
                            <tr>
                                <td>Nomor Bus</td>
                                <td class="value">{{ $bus->bus_number }}</td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td class="value">{{ $bus->model }}</td>
                            </tr>
                            <tr>
                                <td>Kapasitas Kursi</td>
                                <td class="value">{{ $bus->seat_capacity }} kursi</td>
                            </tr>
                        </table>
                    </div>

                        <div class="seat-layout">
                            <h3 class="section-title">Denah Kursi</h3>
                            <div class="seat-map-container">
                                <div class="seat-map">
                                    <!-- Steering wheel icon -->
                                    <div class="steering-wheel">
                                        <i class="fa-solid fa-steering-wheel"></i>
                                    </div>

                                    <!-- Seats -->
                                    @php
                                        // This would typically come from your database
                                        $reservedSeats = isset($reservedSeats) ? $reservedSeats : [5, 8, 12, 15, 20];
                                    @endphp

                                    @for ($i = 1; $i <= $bus->seat_capacity; $i++)
                                        @if ($i % 4 == 3)
                                            <div class="aisle"></div> <!-- Center aisle -->
                                        @endif
                                        <div class="seat {{ in_array($i, $reservedSeats) ? 'reserved' : 'available' }}" 
                                            data-seat-number="{{ $i }}">
                                            {{ $i }}
                                        </div>
                                    @endfor
                                </div>
                                
                                <div class="seat-legend">
                                    <div class="legend-item">
                                        <div class="legend-color available"></div>
                                        <span>Tersedia</span>
                                    </div>
                                    <div class="legend-item">
                                        <div class="legend-color reserved"></div>
                                        <span>Sudah dipesan</span>
                                    </div>
                                    <div class="legend-item">
                                        <div class="legend-color selected"></div>
                                        <span>Pilihan Anda</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="journey-details">
                        <h3 class="section-title">Detail Perjalanan</h3>
                        <table class="info-table">
                            <tr>
                                <td>Dari</td>
                                <td class="value">{{ $bus->origin }}</td>
                            </tr>
                            <tr>
                                <td>Ke</td>
                                <td class="value">{{ $bus->destination }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal & Waktu Berangkat</td>
                                <td class="value">{{ $bus->departure_time->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal & Waktu Tiba</td>
                                <td class="value">{{ $bus->arrival_time->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td>Durasi</td>
                                <td class="value">{{ $bus->departure_time->diffInHours($bus->arrival_time) }} jam</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <h3 class="section-title">Fasilitas</h3>
                <div class="amenities">
                    <div class="amenity {{ $bus->has_luggage ? 'available' : 'unavailable' }}">
                        <span class="material-icons">luggage</span>
                        <span>Bagasi</span>
                    </div>
                    <div class="amenity {{ $bus->has_light ? 'available' : 'unavailable' }}">
                        <span class="material-icons">lightbulb</span>
                        <span>Lampu Baca</span>
                    </div>
                    <div class="amenity {{ $bus->has_ac ? 'available' : 'unavailable' }}">
                        <span class="material-icons">ac_unit</span>
                        <span>AC</span>
                    </div>
                    <div class="amenity {{ $bus->has_drink ? 'available' : 'unavailable' }}">
                        <span class="material-icons">local_cafe</span>
                        <span>Minuman</span>
                    </div>
                    <div class="amenity {{ $bus->has_wifi ? 'available' : 'unavailable' }}">
                        <span class="material-icons">wifi</span>
                        <span>WiFi</span>
                    </div>
                    <div class="amenity {{ $bus->has_usb ? 'available' : 'unavailable' }}">
                        <span class="material-icons">usb</span>
                        <span>USB Port</span>
                    </div>
                    <div class="amenity {{ $bus->has_cctv ? 'available' : 'unavailable' }}">
                        <span class="material-icons">videocam</span>
                        <span>CCTV</span>
                    </div>
                </div>
                
                <div class="price-section">
                    <h3 class="section-title">Harga</h3>
                    <div class="price-booking">
                        <div class="price-info">
                            <p class="price-label">Harga tiket per orang</p>
                            <p class="price-value">Rp {{ number_format($bus->price, 0, ',', '.') }}</p>
                        </div>
                        <form action="{{ route('booked') }}" method="POST" id="bookingForm">
                            @csrf
                            <input type="hidden" name="name" value="{{ $bus->name }}">
                            <input type="hidden" name="origin" value="{{ $bus->origin }}">
                            <input type="hidden" name="destination" value="{{ $bus->destination }}">
                            <input type="hidden" name="departure_time" value="{{ $bus->departure_time }}">
                            <input type="hidden" name="price" value="{{ $bus->price }}">
                            <input type="hidden" name="selected_seats" id="selectedSeats" value="">
                            <div class="selected-seats-info">
                                <p>Kursi yang dipilih: <span id="selectedSeatsText">Belum ada</span></p>
                                <p>Total: <span id="totalPrice">Rp 0</span></p>
                            </div>
                            <button type="submit" class="booking-button" id="bookBtn" disabled>
                                Lanjutkan Pesanan
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="terms-section">
                    <h3 class="section-title">Ketentuan</h3>
                    <ul class="terms-list">
                        <li>Penumpang diharapkan tiba di tempat keberangkatan minimal 30 menit sebelum jadwal.</li>
                        <li>Tiket tidak dapat dibatalkan, namun dapat diubah jadwalnya maksimal 24 jam sebelum keberangkatan.</li>
                        <li>Setiap penumpang berhak membawa bagasi maksimal 20kg.</li>
                        <li>Barang-barang berharga tetap menjadi tanggung jawab penumpang.</li>
                        <li>Dilarang membawa barang-barang terlarang dan berbahaya.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
    /* Main Layout Styles */
    .main-content {
        padding: 20px;
        font-family: 'Roboto', sans-serif;
    }

    .bus-detail-card {
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 20px;
    }

    .bus-header {
        background-color: #006064;
        color: white;
        padding: 20px;
    }

    .bus-header h2 {
        margin: 0;
        font-size: 1.5rem;
    }

    .bus-content {
        padding: 20px;
    }

    /* Info Section Layout */
    .info-section {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 30px;
    }

    .bus-basic-info, .journey-details {
        flex: 1;
        min-width: 300px;
    }

    /* Section Titles */
    .section-title {
        color: #006064;
        margin-bottom: 15px;
        font-size: 1.2rem;
        border-bottom: 2px solid #e0f7fa;
        padding-bottom: 8px;
    }

    /* Bus Logo */
    .bus-logo {
        max-width: 200px;
        margin-bottom: 20px;
        display: block;
    }

    /* Info Tables */
    .info-table {
        width: 100%;
        border-collapse: collapse;
    }

    .info-table tr {
        border-bottom: 1px solid #eee;
    }

    .info-table td {
        padding: 10px 0;
    }

    .info-table td:first-child {
        width: 40%;
        color: #555;
    }

    .info-table td.value {
        font-weight: bold;
        color: #333;
    }

    /* Seat Layout */
    .seat-layout {
        flex: 1;
        min-width: 300px;
    }

    .seat-map-container {
        background-color: #f5f5f5;
        padding: 20px;
        border-radius: 10px;
    }

    .seat-map {
        display: grid;
        grid-template-columns: repeat(2, 1fr) auto repeat(2, 1fr);
        gap: 10px;
        max-width: 350px;
        margin-bottom: 20px;
    }

    .steering-wheel {
        grid-column: 4 / span 2;
        text-align: center;
        margin-bottom: 15px;
    }

    .steering-wheel i {
        font-size: 30px;
        color: #006064;
    }

    .aisle {
        width: 20px;
    }

    .seat {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .seat.available {
        background-color: #4CAF50;
        color: white;
    }

    .seat.reserved {
        background-color: #F44336;
        color: white;
        cursor: not-allowed;
    }

    .seat.selected {
        background-color: #2196F3;
        color: white;
        transform: scale(1.05);
        box-shadow: 0 0 8px rgba(33, 150, 243, 0.7);
    }

    .seat.available:hover {
        transform: scale(1.05);
        box-shadow: 0 0 8px rgba(76, 175, 80, 0.7);
    }

    /* Seat Legend */
    .seat-legend {
        display: flex;
        gap: 15px;
        margin-top: 15px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .legend-color {
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }

    .legend-color.available {
        background-color: #4CAF50;
    }

    .legend-color.reserved {
        background-color: #F44336;
    }

    .legend-color.selected {
        background-color: #2196F3;
    }

    /* Selected Seats Info */
    .selected-seats-info {
        margin-bottom: 15px;
    }

    /* Amenities */
    .amenities {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }

    .amenity {
        padding: 10px 20px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        gap: 10px;
        transition: transform 0.2s;
    }

    .amenity:hover {
        transform: translateY(-2px);
    }

    .amenity.available {
        background-color: #e0f7fa;
        color: #006064;
    }

    .amenity.unavailable {
        background-color: #f5f5f5;
        color: #757575;
    }

    .amenity .material-icons {
        font-size: 20px;
    }

    /* Price Section */
    .price-section {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .price-booking {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .price-label {
        margin-bottom: 5px;
        color: #555;
    }

    .price-value {
        font-size: 1.5em;
        font-weight: bold;
        color: #D50000;
        margin: 0;
    }

    .booking-button {
        background-color: #006064;
        color: white;
        border: none;
        padding: 12px 25px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .booking-button:disabled {
        background-color: #B0BEC5;
        cursor: not-allowed;
    }

    .booking-button:not(:disabled):hover {
        background-color: #00838f;
    }

    /* Terms Section */
    .terms-section {
        background-color: #e0f7fa;
        padding: 20px;
        border-radius: 10px;
    }

    .terms-list {
        padding-left: 20px;
        line-height: 1.6;
        margin: 0;
    }

    .terms-list li {
        margin-bottom: 8px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .price-booking {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .booking-button {
            width: 100%;
        }
    }
    </style>

    <!-- Font Awesome for steering wheel icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Material Icons for amenities -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Google Roboto Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const seats = document.querySelectorAll('.seat');
        const selectedSeatsInput = document.getElementById('selectedSeats');
        const selectedSeatsText = document.getElementById('selectedSeatsText');
        const totalPriceText = document.getElementById('totalPrice');
        const bookBtn = document.getElementById('bookBtn');
        const basePrice = {{ $bus->price }};
        
        let selectedSeats = [];
        
        // Add click event to each available seat
        seats.forEach(seat => {
            if (!seat.classList.contains('reserved')) {
                seat.addEventListener('click', function() {
                    const seatNumber = this.getAttribute('data-seat-number');
                    
                    if (this.classList.contains('selected')) {
                        // Deselect the seat
                        this.classList.remove('selected');
                        this.classList.add('available');
                        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                    } else {
                        // Select the seat
                        this.classList.remove('available');
                        this.classList.add('selected');
                        selectedSeats.push(seatNumber);
                    }
                    
                    // Update the form and display
                    updateSelectedSeatsDisplay();
                });
            }
        });
        
        function updateSelectedSeatsDisplay() {
            // Sort seats numerically for better display
            selectedSeats.sort((a, b) => a - b);
            
            // Update hidden input value
            selectedSeatsInput.value = selectedSeats.join(',');
            
            // Update visual display
            if (selectedSeats.length > 0) {
                selectedSeatsText.textContent = selectedSeats.join(', ');
                
                // Calculate and update total price
                const totalPrice = basePrice * selectedSeats.length;
                totalPriceText.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
                
                // Enable booking button
                bookBtn.disabled = false;
            } else {
                selectedSeatsText.textContent = 'Belum ada';
                totalPriceText.textContent = 'Rp 0';
                
                // Disable booking button
                bookBtn.disabled = true;
            }
        }
    });
    </script>
    @endsection