
@extends('layout')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


@section('title', $bus->name . ' - Detail Bus - VoyageRide')

@section('content')
<div class="container" style="padding-top: 30px;">
    <div class="sidebar">
        <div class="sidebar-section">
            <h3 class="sidebar-heading">Menu</h3>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('landing') }}">
                        <span class="material-icons">home</span>
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('booking') }}">
                        <span class="material-icons">confirmation_number</span>
                        Pemesanan
                    </a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="main-content">
        <div style="background-color: white; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;">
            <div style="background-color: #006064; color: white; padding: 20px;">
                <h2 style="margin: 0;">{{ $bus->name }} - {{ $bus->bus_type }}</h2>
            </div>
            
            <div style="padding: 20px;">
                <div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom: 30px;">
                    <div style="flex: 1; min-width: 300px;">
                        <img src="{{ asset($bus->logo_url) }}" alt="{{ $bus->name }}" style="max-width: 200px; margin-bottom: 20px;">
                        
                        <h3 style="color: #006064; margin-bottom: 15px;">Informasi Bus</h3>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; width: 40%;">Nomor Bus</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->bus_number }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee;">Model</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->model }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee;">Kapasitas Kursi</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->seat_capacity }} kursi</td>
                            </tr>
                        </table>
                    </div>

                    <h3 style="color: #006064; margin-bottom: 15px;">Denah Kursi</h3>
                        <div style="display: grid; grid-template-columns: repeat(2, 1fr) auto repeat(2, 1fr); gap: 10px 20px; max-width: 350px; background-color: #f1f1f1; padding: 15px; border-radius: 10px;">
                            <!-- Tambahkan ikon kemudi di depan kanan -->
                            <!-- Gunakan FontAwesome -->
                        <div style="grid-column: 4 / span 2; text-align: center; margin-bottom: 10px;">
                            <i class="fa-solid fa-steering-wheel" style="font-size: 30px; color: #006064;"></i>
                        </div>


                    @for ($i = 1; $i <= $bus->seat_capacity; $i++)
                        @if ($i % 4 == 3)
                            <div style="width: 20px;"></div> <!-- Lorong di tengah -->
                                 @endif
                            <div style="width: 45px; height: 45px; background-color: #006064; color: white; display: flex; align-items: center; justify-content: center; border-radius: 5px;">
                        {{ $i }}
                        </div>
                        @endfor
                        </div>


                    
                    <div style="flex: 1; min-width: 300px;">
                        <h3 style="color: #006064; margin-bottom: 15px;">Detail Perjalanan</h3>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; width: 40%;">Dari</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->origin }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee;">Ke</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->destination }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee;">Tanggal & Waktu Berangkat</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->departure_time->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee;">Tanggal & Waktu Tiba</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->arrival_time->format('d M Y, H:i') }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee;">Durasi</td>
                                <td style="padding: 8px 0; border-bottom: 1px solid #eee; font-weight: bold;">{{ $bus->departure_time->diffInHours($bus->arrival_time) }} jam</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <h3 style="color: #006064; margin-bottom: 15px;">Fasilitas</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 30px;">
                    <div style="background-color: {{ $bus->has_luggage ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_luggage ? '#006064' : '#757575' }};">
                        <span class="material-icons">luggage</span>
                        <span>Bagasi</span>
                    </div>
                    <div style="background-color: {{ $bus->has_light ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_light ? '#006064' : '#757575' }};">
                        <span class="material-icons">lightbulb</span>
                        <span>Lampu Baca</span>
                    </div>
                    <div style="background-color: {{ $bus->has_ac ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_ac ? '#006064' : '#757575' }};">
                        <span class="material-icons">ac_unit</span>
                        <span>AC</span>
                    </div>
                    <div style="background-color: {{ $bus->has_drink ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_drink ? '#006064' : '#757575' }};">
                        <span class="material-icons">local_cafe</span>
                        <span>Minuman</span>
                    </div>
                    <div style="background-color: {{ $bus->has_wifi ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_wifi ? '#006064' : '#757575' }};">
                        <span class="material-icons">wifi</span>
                        <span>WiFi</span>
                    </div>
                    <div style="background-color: {{ $bus->has_usb ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_usb ? '#006064' : '#757575' }};">
                        <span class="material-icons">usb</span>
                        <span>USB Port</span>
                    </div>
                    <div style="background-color: {{ $bus->has_cctv ? '#e0f7fa' : '#f5f5f5' }}; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; gap: 10px; color: {{ $bus->has_cctv ? '#006064' : '#757575' }};">
                        <span class="material-icons">videocam</span>
                        <span>CCTV</span>
                    </div>
                </div>
                
                <div style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; margin-bottom: 30px;">
                    <h3 style="color: #006064; margin-bottom: 15px;">Harga</h3>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <p style="margin-bottom: 5px;">Harga tiket per orang</p>
                            <p style="font-size: 1.5em; font-weight: bold; color: #D50000; margin: 0;">Rp {{ number_format($bus->price, 0, ',', '.') }}</p>
                        </div>
                        <button style="background-color: #006064; color: white; border: none; padding: 12px 25px; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer;">Pesan Sekarang</button>
                    </div>
                </div>
                
                <div style="background-color: #e0f7fa; padding: 20px; border-radius: 10px;">
                    <h3 style="color: #006064; margin-bottom: 15px;">Ketentuan</h3>
                    <ul style="padding-left: 20px; line-height: 1.6;">
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
</div>
@endsection