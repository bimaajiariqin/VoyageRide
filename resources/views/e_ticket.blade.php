  @extends('layout')

  @section('content')

  <div class="e-ticket-page">
    <div class="ticket-actions">
      <button onclick="window.print()" class="btn btn-print">
        <i class="fas fa-print"></i> Cetak E-Ticket
      </button>
      <button onclick="downloadPDF()" class="btn btn-download">
        <i class="fas fa-download"></i> Download PDF
      </button>
    </div>

    <div class="e-ticket-container" id="e-ticket">
      <div class="e-ticket-header">
        <div class="company-logo">
          <img src="{{ asset('Logo VoyageRide.png') }}" alt="Bus Booking Logo">
          <h2>E-TICKET BUS</h2>
        </div>
        <div class="booking-info">
          <div class="booking-number">{{ $booking->booking_number }}</div>
          <div class="booking-status {{ strtolower($booking->status) }}">{{ ucfirst($booking->status) }}</div>
        </div>
      </div>

      <div class="ticket-details">
        <div class="route-info">
          <div class="origin-destination">
            <div class="location origin">
              <div class="city">{{ $booking->bus->origin->name  }}</div>
              <div class="time">{{ \Carbon\Carbon::parse($booking->bus->departure_time)->format('H:i') }}</div>
              <div class="date">{{ \Carbon\Carbon::parse($booking->bus->departure_time)->translatedFormat('d M Y') }}</div>
            </div>
            
            <div class="journey-line">
              <div class="dot"></div>
              <div class="line"></div>
              <div class="dot"></div>
            </div>
            
            <div class="location destination">
              <div class="city">{{ $booking->bus->destination->name }}</div>
              <!-- Estimasi waktu tiba -->
              <div class="time">{{ \Carbon\Carbon::parse($booking->bus->departure_time)->addHours(6)->format('H:i') }}</div>
              <div class="date">{{ \Carbon\Carbon::parse($booking->bus->departure_time)->translatedFormat('d M Y') }}</div>
            </div>
          </div>
          
          <div class="bus-details">
            <div class="bus-info">
              <h4>{{ $booking->bus->name }}</h4>
              <h4>{{ $booking->bus->model }}</h4>
            </div>
          </div>
        </div>

        <div class="passenger-section">
          <h4>Detail Penumpang</h4>
          
          <div class="passenger-list">
            @foreach($booking->passengers as $index => $passenger)
              <div class="passenger-item">
                <div class="passenger-number">{{ $index + 1 }}</div>
                <div class="passenger-details">
                  <div class="passenger-name">{{ $passenger->name }}</div>
                  <div class="passenger-id">NIK: {{ $passenger->nik }}</div>
                </div>
                <div class="seat-number">
                  <span>Kursi</span>
                  <strong>{{ $passenger->seat_number }}</strong>
                </div>
              </div>
            @endforeach
          </div>
        </div>
        
        <div class="payment-details">
          <h4>Detail Pembayaran</h4>
          <div class="payment-grid">
            <div class="payment-item">
              <div class="label">ID Pembayaran</div>
              <div class="value">{{ $booking->payment->transaction_id ?? '-' }}</div>
            </div>
            <div class="payment-item">
              <div class="label">Metode Pembayaran</div>
              <div class="value">{{ $booking->payment->payment_method ?? '-' }}</div>
            </div>
            <div class="payment-item">
              <div class="label">Tanggal Pembayaran</div>
              <div class="value">{{ $booking->payment && $booking->payment->payment_date ? \Carbon\Carbon::parse($booking->payment->payment_date)->format('d M Y, H:i') : '-' }}</div>
            </div>
            <div class="payment-item">
              <div class="label">Total Pembayaran</div>
              <div class="value">Rp {{ number_format($booking->grand_total, 0, ',', '.') }}</div>
            </div>
          </div>
        </div>

        <div class="ticket-footer">
          <div class="qr-code" id="qrcode"></div>
          <div class="ticket-notes">
            <h5>Catatan Penting:</h5>
            <ul>
              <li>Tiba di terminal minimal 30 menit sebelum keberangkatan</li>
              <li>Bawa identitas yang sesuai dengan data penumpang</li>
              <li>E-ticket ini adalah bukti sah pemesanan tiket bus</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Include QR Code library -->
  <script src="https://cdn.jsdelivr.net/npm/qrcode@1.5.0/build/qrcode.min.js"></script>
  <!-- Include jsPDF for PDF generation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

  <script>
function downloadPDF() {
  const { jsPDF } = window.jspdf;
  const doc = new jsPDF('p', 'mm', 'a4');
  const ticket = document.getElementById('e-ticket');

  html2canvas(ticket, {
    scale: 3,
    useCORS: true,
    scrollY: -window.scrollY
  }).then(canvas => {
    const imgWidth = 210; // A4 mm
    const pageHeight = 297; // A4 mm
    const canvasWidth = canvas.width;
    const canvasHeight = canvas.height;
    const imgHeight = (imgWidth / canvasWidth) * canvasHeight;

    const pageCanvas = document.createElement('canvas');
    const pageCtx = pageCanvas.getContext('2d');
    const pageHeightPx = (pageHeight * canvasWidth) / imgWidth;

    let pageCount = Math.ceil(canvasHeight / pageHeightPx);
    let position = 0;

    for (let i = 0; i < pageCount; i++) {
      const startY = i * pageHeightPx;
      const isLast = i === pageCount - 1;
      const thisPageHeight = isLast ? canvasHeight - startY : pageHeightPx;

      pageCanvas.width = canvasWidth;
      pageCanvas.height = thisPageHeight;

      pageCtx.clearRect(0, 0, canvasWidth, thisPageHeight);
      pageCtx.drawImage(canvas, 0, -startY);

      const imgData = pageCanvas.toDataURL('image/png');
      if (i > 0) doc.addPage();
      const imgH = (imgWidth / canvasWidth) * thisPageHeight;
      doc.addImage(imgData, 'PNG', 0, 0, imgWidth, imgH);
    }

    doc.save('e-ticket-{{ $booking->booking_number }}.pdf');
  });
}

</script>


  <style>

    @media print {
      body * {
        visibility: hidden;
      }
      .e-ticket-container, .e-ticket-container * {
        visibility: visible;
      }
      .e-ticket-container {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
      }
      .ticket-actions {
        display: none;
      }
      .ticket-footer {
    page-break-inside: avoid;
  }
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #F5F5F5;
      color: #333;
    }

    .e-ticket-page {
      max-width: 800px;
      margin: 30px auto;
      padding: 0 15px;
    }

    .ticket-actions {
      display: flex;
      gap: 10px;
      margin-bottom: 20px;
      justify-content: flex-end;
    }

    .btn {
      padding: 10px 20px;
      border-radius: 8px;
      border: none;
      font-weight: 600;
      font-size: 14px;
      cursor: pointer;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s;
    }

    .btn-print {
      background-color: #006064;
      color: white;
    }

    .btn-print:hover {
      background-color: #004d4d;
    }

    .btn-download {
      background-color: #004d4d;
      color: white;
    }

    .btn-download:hover {
      background-color: #003838;
    }

    .e-ticket-container {
      background-color: white;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .e-ticket-header {
      background: linear-gradient(135deg, #006064, #004d4d);
      color: white;
      padding: 25px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #e-ticket {
  padding: 20px;
  box-sizing: border-box;
  background: white;
}


    .company-logo {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .company-logo img {
      height: 40px;
      width: auto;
    }

    .company-logo h2 {
      margin: 0;
      font-size: 22px;
      letter-spacing: 1px;
    }

    .booking-info {
      text-align: right;
    }

    .booking-number {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .booking-status {
      display: inline-block;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
    }

    .booking-status.confirmed {
      background: #e0f2f1;
      color: #00695c;
    }

    .ticket-details {
      padding: 25px;
    }

    .route-info {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-bottom: 30px;
      border-bottom: 1px dashed #ccc;
      padding-bottom: 20px;
    }

    .origin-destination {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .location {
      text-align: center;
      flex: 1;
    }

    .city {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .time {
      font-size: 24px;
      font-weight: 800;
      color: #006064;
      margin-bottom: 2px;
    }

    .date {
      font-size: 14px;
      color: #666;
    }

    .journey-line {
      display: flex;
      align-items: center;
      flex: 2;
      padding: 0 20px;
    }

    .journey-line .dot {
      width: 12px;
      height: 12px;
      background-color: #006064;
      border-radius: 50%;
    }

    .journey-line .line {
      flex-grow: 1;
      height: 2px;
      background-color: #006064;
    }

    .bus-details {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .bus-info h4 {
      margin: 0 0 5px 0;
      font-size: 18px;
    }

    .bus-type {
      color: #666;
      font-size: 14px;
    }

    .passenger-section {
      margin-bottom: 30px;
      border-bottom: 1px dashed #ccc;
      padding-bottom: 20px;
    }

    .passenger-section h4 {
      margin-top: 0;
      font-size: 16px;
      margin-bottom: 16px;
      color: #006064;
    }

    .passenger-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .passenger-item {
      display: flex;
      align-items: center;
      background-color: #f5f5f5;
      border-radius: 10px;
      padding: 15px;
    }

    .passenger-number {
      width: 30px;
      height: 30px;
      background-color: #006064;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      font-weight: 700;
      margin-right: 15px;
    }

    .passenger-details {
      flex-grow: 1;
    }

    .passenger-name {
      font-weight: 700;
      font-size: 16px;
      margin-bottom: 3px;
    }

    .passenger-id {
      color: #666;
      font-size: 13px;
    }

    .seat-number {
      background-color: #e0f7fa;
      padding: 8px 15px;
      border-radius: 6px;
      text-align: center;
    }

    .seat-number span {
      display: block;
      font-size: 11px;
      color: #666;
      margin-bottom: 2px;
    }

    .seat-number strong {
      font-size: 18px;
      color: #006064;
    }

    .payment-details {
      margin-bottom: 30px;
    }

    .payment-details h4 {
      margin-top: 0;
      font-size: 16px;
      margin-bottom: 16px;
      color: #006064;
    }

    .payment-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 15px;
    }

    .payment-item {
      background-color: #f5f5f5;
      padding: 12px;
      border-radius: 8px;
    }

    .payment-item .label {
      color: #666;
      font-size: 12px;
      margin-bottom: 4px;
    }

    .payment-item .value {
      font-weight: 600;
      font-size: 15px;
    }

    .ticket-footer {
  display: flex;
  gap: 20px;
  border-top: 1px dashed #ccc;
  padding-top: 20px;

  /* Cegah pemisahan ke halaman lain */
  page-break-inside: avoid;
  break-inside: avoid;
}

section, .ticket-container, .detail-pembayaran {
  page-break-inside: avoid;
  break-inside: avoid;
}


    .qr-code {
      padding: 10px;
      background-color: white;
      border-radius: 8px;
      border: 1px solid #ccc;
      height: 120px;
      width: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .ticket-notes {
      flex-grow: 1;
    }

    .ticket-notes h5 {
      margin-top: 0;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .ticket-notes ul {
      margin: 0;
      padding-left: 16px;
      font-size: 13px;
      color: #666;
    }

    .ticket-notes li {
      margin-bottom: 5px;
    }

    @media (max-width: 768px) {
      .origin-destination {
        flex-direction: column;
        gap: 15px;
      }
      
      .journey-line {
        transform: rotate(90deg);
        width: 100px;
        margin: 10px 0;
      }
      
      .payment-grid {
        grid-template-columns: 1fr;
      }
      
      .ticket-footer {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }
      
      .ticket-notes ul {
        text-align: left;
      }
    }
  </style>


  @endsection