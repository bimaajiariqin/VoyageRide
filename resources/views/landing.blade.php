
@extends('layout')

@section('title', 'Home')

@section('content')
<!-- Search Container -->
<div class="search-container">
    <form action="{{ route('search') }}" method="GET" class="search-bar">
        <div class="search-input">
            <label for="dari">Dari</label>
            <input list="dari-list" name="dari" id="dari" placeholder="Kota Asal" required>
        </div>

        <!-- Tombol swap -->
        <div class="swap-button" style="display: flex; align-items: center; padding: 0 10px;">
            <button type="button" onclick="swapLocations()" title="Tukar Kota"
                style="background: #eee; border: none; padding: 5px 10px; border-radius: 6px; cursor: pointer;">
                ⇄
            </button>
        </div>

        <div class="search-input">
            <label for="ke">Ke</label>
            <input list="ke-list" name="ke" id="ke" placeholder="Kota Tujuan" required>
        </div>

        <!-- Datalists -->
        <datalist id="dari-list">
            @foreach($cities as $city)
                <option value="{{ $city->name }}">
            @endforeach
        </datalist>

        <datalist id="ke-list">
            @foreach($cities as $city)
                <option value="{{ $city->name }}">
            @endforeach
        </datalist>

        <div class="date-input">
            <label for="tanggal_pergi">Tanggal Pergi</label>
            <input type="date" name="tanggal_pergi" id="tanggal_pergi" required>
        </div>

        <button type="submit" class="search-button">
            <span class="material-icons">search</span>
            Cari
        </button>
    </form>
</div>

<script>
    function swapLocations() {
        const dari = document.getElementById('dari');
        const ke = document.getElementById('ke');
        [dari.value, ke.value] = [ke.value, dari.value];
    }
</script>



<!-- Steps Section -->
<section class="steps-section">
    <h2 class="steps-title">Cara Pemesanan Tiket Bis</h2>
    <div class="steps-container">
        <div class="step">
            <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006064" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <path d="M12 8v4l3 3"></path>
            </svg>
            <div class="step-number">1</div>
            <div class="step-text">Masukkan tempat keberangkatan, tujuan, tanggal perjalanan dan kemudian klik 'Cari'</div>
        </div>
        <div class="step">
            <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006064" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                <path d="M22 7H2"></path>
                <path d="M9 15h6"></path>
            </svg>
            <div class="step-number">2</div>
            <div class="step-text">Masukkan tempat keberangkatan, tujuan, tanggal perjalanan dan kemudian klik 'Cari'</div>
        </div>
        <div class="step">
            <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#006064" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                <line x1="1" y1="10" x2="23" y2="10"></line>
            </svg>
            <div class="step-number">3</div>
            <div class="step-text">Pembayaran dapat dilakukan melalui transfer ATM, internet banking, Alfamart, kartu Kredit/Debit, Mandiri Clickpay, Bca Clickpay dll</div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section class="benefits-section">
        <div class="promise-badge">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="#006064" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
            </svg>
        </div>
        <h2 class="benefits-title">KELEBIHAN LAYANAN KAMI</h2>
        <div class="benefits-container">
            <div class="benefit">
                <div>
                    <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/>
                    </svg>
                    <h3 class="benefit-title">TANPA BIAYA TAMBAHAN</h3>
                </div>
                <p class="benefit-text">Pesan bis anda dengan harga terbaik</p>
            </div>
            <div class="benefit">
                <div>
                    <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                    <h3 class="benefit-title">PEMBAYARAN ONLINE YANG AMAN & NYAMAN</h3>
                </div>
                <p class="benefit-text">Bayar tiket online anda dengan cara yang aman dan nyaman</p>
            </div>
            <div class="benefit">
                <div>
                    <svg class="benefit-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M4 16c0 .88.39 1.67 1 2.22V20c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h8v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1.78c.61-.55 1-1.34 1-2.22V6c0-3.5-3.58-4-8-4s-8 .5-8 4v10zm3.5 1c-.83 0-1.5-.67-1.5-1.5S6.67 14 7.5 14s1.5.67 1.5 1.5S8.33 17 7.5 17zm9 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm1.5-6H6V6h12v5z"/>
                    </svg>
                    <h3 class="benefit-title">PILIH BIS YANG ANDA INGINKAN</h3>
                </div>
                <p class="benefit-text">Pesan bis sesuai pilihan anda</p>
            </div>
        </div>
    </section>
<!-- Promo Section -->
<section class="promo-section">
    <h2 class="promo-title">Promo Spesial</h2>
    <p class="promo-text">Nikmati penawaran terbaik untuk perjalanan bus Anda. Pesan sekarang dan hemat lebih banyak!</p>
    <div class="promo-card">
        <div class="promo-info">
            <img src="{{ asset('Logo Sinar Jaya.png') }}" alt="Sinar Jaya" class="promo-logo">
            <h3 class="promo-headline">Promo Spesial Jakarta - Bandung</h3>
            <p class="promo-discount">Diskon 15% untuk semua tiket!</p>
            <p class="promo-details">Berlaku hingga 31 Maret 2025. Syarat dan ketentuan berlaku.</p>
        </div>
        <a href="#" class="promo-button">Pesan Sekarang</a>
    </div>
</section>
@endsection