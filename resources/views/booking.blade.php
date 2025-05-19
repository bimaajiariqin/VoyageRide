@extends('layout')

@section('content')

<div class="booking-history-page">

  <h3 class="page-title">Riwayat Pemesanan</h3>

  @if($bookings->isEmpty())
    <p>Belum ada riwayat pemesanan.</p>
  @else
    <div class="booking-cards-container">
      @foreach($bookings as $booking)
        <div class="booking-card">
          <div class="booking-header">
            <div>
              <strong>ID Pemesanan:</strong> {{ $booking->booking_number }}<br>
              <strong>Tanggal Pesan:</strong> {{ $booking->created_at->format('d M Y, H:i') }}
            </div>
            <div class="status {{ strtolower($booking->status) }}">
              {{ ucfirst($booking->status) }}
            </div>
          </div>

          <div class="booking-details">
            <h5>Detail Penumpang & Kursi</h5>
            @foreach($booking->passengers as $passenger)
              <div class="passenger-item">
                <strong>{{ $passenger->name }}</strong> - Kursi: {{ $passenger->seat_number }}
              </div>
            @endforeach

            <h5 class="mt-3">Ringkasan Pembayaran</h5>
            @php
              $ticketPrice = $booking->total_price;
              $tax = $ticketPrice * 0.04;
              $totalPayment = $ticketPrice + $tax;
            @endphp
            <div class="d-flex justify-content-between">
              <span>Harga Tiket</span>
              <strong>Rp {{ number_format($ticketPrice, 0, ',', '.') }}</strong>
            </div>
            <div class="d-flex justify-content-between mt-1">
              <span>Pajak (4%)</span>
              <strong>Rp {{ number_format($tax, 0, ',', '.') }}</strong>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
              <span><strong>Total Bayar</strong></span>
              <strong class="total-payment">Rp {{ number_format($totalPayment, 0, ',', '.') }}</strong>
            </div>
          </div>

          @if($booking->status == 'pending')
          <div class="payment-deadline mt-3">
            <small class="text-danger fw-bold">
              Selesaikan pembayaran sebelum: {{ $booking->payment_deadline->format('d M Y, H:i') }}
            </small>
          </div>
          @endif
        </div>
      @endforeach
    </div>
  @endif

</div>

<style>
  :root {
    --primary: #0056d2;
    --primary-light: #e6f0ff;
    --gray-bg: #f7fafc;
    --gray-text: #4a5568;
    --border-color: #e2e8f0;
    --radius: 12px;
  }

  body {
    font-family: 'Poppins', sans-serif;
    background-color: var(--gray-bg);
    color: var(--gray-text);
    font-size: 14px;
  }

  .booking-history-page {
    max-width: 1000px;
    margin: 30px auto;
    padding: 0 16px;
  }

  .page-title {
    font-size: 22px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 24px;
    position: relative;
    padding-bottom: 6px;
  }

  .page-title::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 60px;
    height: 3px;
    background: linear-gradient(90deg, var(--primary), #00a0e9);
    border-radius: 2px;
  }

  .booking-cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 20px;
  }

  .booking-card {
    background-color: white;
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    padding: 20px;
    transition: 0.3s ease;
  }

  .booking-card:hover {
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    transform: translateY(-3px);
  }

  .booking-header {
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid var(--border-color);
    padding-bottom: 12px;
    margin-bottom: 16px;
    font-size: 13px;
  }

  .status {
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    white-space: nowrap;
  }

  .status.pending {
    background: #fff5f5;
    color: #e53e3e;
  }

  .status.paid {
    background: #e6fffa;
    color: #047857;
  }

  .status.cancelled {
    background: #fef2f2;
    color: #c53030;
  }

  .booking-details {
    background-color: var(--gray-bg);
    padding: 16px;
    border-radius: 8px;
    font-size: 13px;
  }

  .booking-details h5 {
    font-size: 13px;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 8px;
  }

  .passenger-item {
    background: white;
    padding: 6px 10px;
    border-radius: 6px;
    margin-bottom: 6px;
    border: 1px solid #edf2f7;
  }

  .d-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .mt-1 { margin-top: 4px; }
  .mt-3 { margin-top: 12px; }

  hr {
    border: none;
    height: 1px;
    background: #e2e8f0;
    margin: 10px 0;
  }

  .total-payment {
    color: var(--primary);
    font-weight: 800;
    font-size: 15px;
  }

  .payment-deadline {
    background: #fff5f5;
    padding: 10px;
    border-left: 4px solid #e53e3e;
    border-radius: 6px;
    font-size: 12px;
  }

  .text-danger { color: #e53e3e !important; }
  .fw-bold { font-weight: 700; }

  .booking-history-page > p {
    text-align: center;
    padding: 20px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    font-size: 14px;
    color: #718096;
  }

  @media (max-width: 480px) {
    .booking-header {
      flex-direction: column;
      align-items: flex-start;
      gap: 8px;
    }
  }
</style>

@endsection
