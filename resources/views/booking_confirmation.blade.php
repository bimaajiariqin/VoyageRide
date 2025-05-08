@extends('layout')

@section('content')

@php
    $deadline = \Carbon\Carbon::now()->addMinutes(10); // Tenggat 10 menit dari sekarang
@endphp


<div class="payment-page">

  <!-- Left: Payment Methods -->
  <div class="payment-methods">
    <h4 class="section-title">Pilih Metode Pembayaran</h4>

    <form action="{{ route('payment.process') }}" method="POST">
      @csrf

      <div class="form-check payment-option">
        <input class="form-check-input" type="radio" name="payment_method" id="virtual_account" value="Virtual Account" checked>
        <label class="form-check-label d-flex align-items-center justify-content-between w-100" for="virtual_account">
          <span>Virtual Account Transfer</span>
          <img src="{{ asset('images/BCA.png') }}" alt="BCA">
          <img src="{{ asset('images/Mandiri.png') }}" alt="Mandiri">
          <img src="{{ asset('images/BRI.png') }}" alt="BRI">
        </label>
      </div>


      <div class="form-check payment-option">
        <input class="form-check-input" type="radio" name="payment_method" id="gopay" value="GoPay">
        <label class="form-check-label d-flex align-items-center justify-content-between w-100" for="gopay">
          <span>GoPay</span>
          <img src="{{ asset('images/Gopay.png') }}" alt="GoPay">
        </label>
      </div>

      <div class="form-check payment-option">
        <input class="form-check-input" type="radio" name="payment_method" id="indomaret" value="Indomaret">
        <label class="form-check-label d-flex align-items-center justify-content-between w-100" for="indomaret">
          <span>Indomaret</span>
          <img src="{{ asset('images/Indomaret.png') }}" alt="Indomaret">
        </label>
      </div>

      <div class="form-check payment-option">
        <input class="form-check-input" type="radio" name="payment_method" id="alfamart" value="Alfamart">
        <label class="form-check-label d-flex align-items-center justify-content-between w-100" for="alfamart">
          <span>Alfamart</span>
          <img src="{{ asset('images/Alfamart.png') }}" alt="Alfamart">
        </label>
      </div>

      <div class="form-check payment-option">
        <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="Credit Card">
        <label class="form-check-label d-flex align-items-center justify-content-between w-100" for="credit_card">
          <span>Kartu Kredit / Debit</span>
          <img src="{{ asset('images/Visa.png') }}" alt="Visa">
          <img src="{{ asset('images/Mastercard.png') }}" alt="Mastercard">
        </label>
      </div>

      <div class="form-check payment-option">
        <input class="form-check-input" type="radio" name="payment_method" id="manual_transfer" value="Manual Transfer">
        <label class="form-check-label d-flex align-items-center justify-content-between w-100" for="manual_transfer">
          <span>Manual Bank Transfer</span>
          <img src="{{ asset('images/BCA.png') }}" alt="BCA">
          <img src="{{ asset('images/Mandiri.png') }}" alt="Mandiri">
          <img src="{{ asset('images/BRI.png') }}" alt="BRI">
        </label>
      </div>

      <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
    </form>
  </div>

  <!-- Right: Payment Summary -->
  <div class="payment-summary">
    <h4 class="section-title">Detail Pemesanan</h4>

    @foreach($passengers as $passenger)
      <div class="mb-3">
        <strong>{{ $passenger['name'] }}</strong>
        <div class="text-muted">Kursi: {{ $passenger['seat'] }}</div>
      </div>
    @endforeach

    <h5 class="section-title mt-4">Ringkasan Pembayaran</h5>

    @php
      $ticketPrice = $totalPrice;
      $tax = $ticketPrice * 0.04;
      $totalPayment = $ticketPrice + $tax;
    @endphp

    <div class="d-flex justify-content-between">
      <span>Harga Tiket</span>
      <strong>Rp {{ number_format($ticketPrice, 0, ',', '.') }}</strong>
    </div>
    <div class="d-flex justify-content-between mt-2">
      <span>Pajak (4%)</span>
      <strong>Rp {{ number_format($tax, 0, ',', '.') }}</strong>
    </div>
    <hr>
    <div class="d-flex justify-content-between">
      <span><strong>Total Bayar</strong></span>
      <strong style="color: #0056d2;">Rp {{ number_format($totalPayment, 0, ',', '.') }}</strong>
    </div>

    <div class="mt-4">
      <h6 class="section-title">Batas Waktu Pembayaran</h6>
      <div class="text-danger fw-bold" id="countdown">
        10:00
      </div>
      <small class="text-muted">Selesaikan pembayaran sebelum waktu ini.</small>

      <script>
          // Ambil deadline dari server
          var deadline = new Date("{{ $deadline->format('Y-m-d H:i:s') }}").getTime();

          var x = setInterval(function() {
              var now = new Date().getTime();
              var distance = deadline - now;

              if (distance < 0) {
              clearInterval(x);
              document.getElementById("countdown").innerHTML = "Waktu Habis";

              // Redirect otomatis
              setTimeout(function() {
                  window.location.href = "{{ url('landing') }}"; // Ganti URL ini kalau mau ke halaman lain
              }, 1000);

              return;
              }

              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Format 2 digit
              minutes = minutes < 10 ? "0" + minutes : minutes;
              seconds = seconds < 10 ? "0" + seconds : seconds;

              document.getElementById("countdown").innerHTML = minutes + ":" + seconds;
          }, 1000);
      </script>
    </div>
  </div>

</div>

<style>
  body {
    background-color: #f5f7fa;
    font-family: 'Poppins', sans-serif;
    color: #005766;
  }

  .payment-page {
    display: flex;
    flex-wrap: wrap;
    margin: 30px;
    gap: 20px;
  }

  .payment-methods, .payment-summary {
    background: #ffffff;
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
  }

  .payment-methods {
    flex: 2;
  }

  .payment-summary {
    flex: 1;
    height: fit-content;
  }

  .section-title {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 20px;
    color: #005766;
  }

  .payment-option {
    display: flex;
    align-items: center;
    padding: 12px 0;
    border-bottom: 1px solid #eee;
  }

  .payment-option:last-child {
    border-bottom: none;
  }

  .payment-option img {
    width: 40px;
    height: auto;
  }

  .form-check-input {
    margin-right: 12px;
    accent-color: #0056d2;
  }

  .btn-primary {
    background-color: #005766;
    border: none;
    border-radius: 12px;
    padding: 14px 20px;
    font-weight: 600;
    font-size: 16px;
    width: 100%;
    margin-top: 20px;
    transition: background 0.3s;
    color: #f5f5f5;
  }

  .btn-primary:hover {
    background-color: #005757;
  }

  .text-muted {
    font-size: 14px;
    color: #888;
  }

  .text-danger {
    color: #d9534f !important;
  }

  hr {
    margin: 20px 0;
    border-color: #eee;
  }

  .fw-bold {
    font-weight: 700;
  }
</style>

@endsection