@extends('layout')

@section('content')

<div class="confirmation-page">
  <div class="confirmation-box">
    <h2 class="text-success">Pembayaran Berhasil!</h2>
    <p class="lead">Terima kasih! Pemesanan Anda telah dikonfirmasi.</p>

    <div class="details-box">
      <h4>Detail Pemesanan</h4>
      <p><strong>Nama Pemesan:</strong> {{ $booking->name ?? '-' }}</p>
      <p><strong>Kode Pemesanan:</strong> {{ $booking->id }}</p>
      <p><strong>Status:</strong> <span class="badge bg-success">Terkonfirmasi</span></p>

      <hr>

      <h4>Detail Pembayaran</h4>
        <p><strong>Metode Pembayaran:</strong> {{ $payment->payment_method ?? '-' }}</p>
        <p><strong>ID Transaksi:</strong> {{ $payment->transaction_id ?? '-' }}</p>
        <p><strong>Total Dibayar:</strong> Rp {{ number_format($payment->amount ?? 0, 0, ',', '.') }}</p>
        <p><strong>Tanggal Pembayaran:</strong> 
            {{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('d M Y, H:i') : '-' }}
        </p>
    </div>

    <a href="{{ route('landing') }}" class="btn btn-primary mt-4">Kembali ke Beranda</a>
  </div>
</div>

<style>
  .confirmation-page {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px 20px;
    background-color: #f5f7fa;
    font-family: 'Poppins', sans-serif;
  }

  .confirmation-box {
    background: #fff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    text-align: center;
    max-width: 600px;
    width: 100%;
  }

  .details-box {
    text-align: left;
    margin-top: 30px;
  }

  .text-success {
    color: #28a745;
  }

  .btn-primary {
    background-color: #005766;
    border: none;
    border-radius: 12px;
    padding: 14px 30px;
    font-weight: 600;
    font-size: 16px;
    color: #fff;
    text-decoration: none;
    transition: background 0.3s;
  }

  .btn-primary:hover {
    background-color: #004a4a;
  }

  .badge.bg-success {
    background-color: #28a745;
    color: white;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 0.9rem;
  }

  hr {
    margin: 20px 0;
    border-color: #eee;
  }
</style>

@endsection
