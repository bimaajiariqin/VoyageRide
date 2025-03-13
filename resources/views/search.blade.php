@extends('layout')

@section('title', 'Hasil Pencarian - VoyageRide Bus Pariwisata')

@section('content')
<body>

    <div class="search-bar">
        <div class="search-item">
            <span class="search-label">Kota Tujuan</span>
            <span class="search-value">{{ $kota_tujuan }}</span>
        </div>
        <div class="search-item">
            <span class="search-label">Tanggal Pergi</span>
            <span class="search-value">{{ date('d-M-Y', strtotime($tanggal_pergi)) }}</span>
        </div>
        <a href="{{ route('landing') }}" class="search-button">Penyesuaian</a>
    </div>

    <div class="container">
        <div class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-heading">Saring</h3>
                <ul class="sidebar-menu">
                    <li><a href="#"><i class="material-icons">local_offer</i> Promo</a></li>
                    <li><a href="#"><i class="material-icons">event</i> Dapat Di Reschedule</a></li>
                </ul>
            </div>
            <div class="sidebar-section">
                <h3 class="sidebar-heading">Fasilitas</h3>
                <ul class="sidebar-menu">
                    <li><a href="#"><i class="material-icons">usb</i> USB Port</a></li>
                    <li><a href="#"><i class="material-icons">videocam</i> CCTV</a></li>
                    <li><a href="#"><i class="material-icons">wb_incandescent</i> Lampu Baca</a></li>
                    <li><a href="#"><i class="material-icons">wifi</i> Wifi</a></li>
                    <li><a href="#"><i class="material-icons">local_drink</i> Air Mineral</a></li>
                    <li><a href="#"><i class="material-icons">ac_unit</i> AC</a></li>
                    <li><a href="#"><i class="material-icons">luggage</i> Bagasi</a></li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="results-header">{{ $total_buses }} Bus Ditemukan</div>
            @foreach($buses as $bus)
                @php
                    $now = now();
                    $is_expired = $bus->departure_time < $now;
                @endphp
                <div class="bus-card {{ $is_expired ? 'expired' : '' }}">
                    <div class="bus-logo">
                        <img src="{{ asset($bus->logo_url) }}" alt="{{ $bus->name }} Logo">
                    </div>
                    <div class="bus-details">
                        <div class="bus-info">
                            <div class="bus-name">{{ $bus->name }}</div>
                            <div class="bus-type">{{ $bus->seat_capacity }} Seat ({{ $bus->bus_type }})</div>
                            <div class="bus-number">No Lambung: {{ $bus->bus_number }} <span style="color: gray;">({{ $bus->model }})</span></div>
                            <div class="bus-time">
                                <i class="material-icons">departure_board</i>
                                <strong>Berangkat:</strong> <span class="time">{{ $bus->departure_time->format('H:i') }}</span>
                                <span class="time-separator">•</span>
                                <i class="material-icons">schedule</i>
                                <strong>Tiba:</strong> <span class="time">{{ $bus->arrival_time->format('H:i') }}</span>
                            </div>
                            <div class="bus-features">
                                @if($bus->has_luggage)<i class="material-icons">luggage</i>@endif
                                @if($bus->has_light)<i class="material-icons">wb_incandescent</i>@endif
                                @if($bus->has_ac)<i class="material-icons">ac_unit</i>@endif
                                @if($bus->has_drink)<i class="material-icons">local_drink</i>@endif
                                @if($bus->has_wifi)<i class="material-icons">wifi</i>@endif
                                @if($bus->has_usb)<i class="material-icons">usb</i>@endif
                                @if($bus->has_cctv)<i class="material-icons">videocam</i>@endif
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div>
                            <div class="bus-price">
                                <div class="price">Rp {{ number_format($bus->price, 0, ',', '.') }}</div>
                            </div>
                            @if($is_expired)
                                <button class="reschedule-button disabled" disabled>Sudah Berangkat</button>
                            @else
                                <a href="{{ route('bus.details', $bus->id) }}" class="reschedule-button">Selengkapnya</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        .expired {
            background-color: #ffdddd;
            opacity: 0.6;
        }
        .disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</body>
@endsection
