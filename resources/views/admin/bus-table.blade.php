<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bus</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #007BFF, #0056b3);
            margin: 0;
            padding: 20px;
            color: white;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            overflow-x: auto;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 26px;
            margin-bottom: 20px;
            color: #0056b3;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 8px;
            white-space: nowrap;
        }

        thead th {
            background: #0056b3;
            color: white;
            font-size: 16px;
            position: sticky;
            top: 0;
            z-index: 2;
            padding: 12px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tr:nth-child(even) {
            background: #f1f1f1;
        }

        tr:hover {
            background: #e0e0e0;
        }

        .back-link {
            display: block;
            width: 180px;
            margin: 20px auto 0;
            text-align: center;
            text-decoration: none;
            background: #ffb400;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
        }

        .back-link:hover {
            background: #ff9500;
            transform: scale(1.05);
        }

        .add-bus-btn {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            text-align: center;
            transition: background 0.3s, transform 0.2s;
            margin: 20px 0;
        }

        .add-bus-btn:hover {
            background: #218838;
            transform: scale(1.05);
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .add-bus-btn,
        .back-link {
            margin: 0; /* Hilangkan margin bawaan */
        }

    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Bus</h1>
    <div class="table-container">
        <table>
        <thead>
    <tr>
        <th>Nama Bus</th>
        <th>Jenis</th>
        <th>Kapasitas</th>
        <th>Nomor</th>
        <th>Model</th>
        <th>Asal</th>
        <th>Tujuan</th>
        <th>Keberangkatan</th>
        <th>Kedatangan</th>
        <th>Harga</th>
        <th>Bagasi</th>
        <th>Lampu</th>
        <th>AC</th>
        <th>Minuman</th>
        <th>WiFi</th>
        <th>USB</th>
        <th>CCTV</th>
        <th>Aksi</th> <!-- Kolom Aksi -->
    </tr>
</thead>
<tbody>
    @foreach($buses as $bus)
        <tr>
            <td>{{ $bus->name }}</td>
            <td>{{ $bus->bus_type }}</td>
            <td>{{ $bus->seat_capacity }}</td>
            <td>{{ $bus->bus_number }}</td>
            <td>{{ $bus->model }}</td>
            <td>{{ $bus->origin }}</td>
            <td>{{ $bus->destination }}</td>
            <td>{{ $bus->departure_time }}</td>
            <td>{{ $bus->arrival_time }}</td>
            <td>Rp {{ number_format($bus->price, 2, ',', '.') }}</td>
            <td>{{ $bus->has_luggage ? '✔' : '✘' }}</td>
            <td>{{ $bus->has_light ? '✔' : '✘' }}</td>
            <td>{{ $bus->has_ac ? '✔' : '✘' }}</td>
            <td>{{ $bus->has_drink ? '✔' : '✘' }}</td>
            <td>{{ $bus->has_wifi ? '✔' : '✘' }}</td>
            <td>{{ $bus->has_usb ? '✔' : '✘' }}</td>
            <td>{{ $bus->has_cctv ? '✔' : '✘' }}</td>
            <td>
                @if(Auth::user()->role === 'AdminUtama')
                    <form action="{{ route('bus.delete', $bus->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bus ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background:#dc3545; color:white; border:none; padding:6px 12px; border-radius:6px; cursor:pointer;">
                            Hapus
                        </button>
                    </form>
                @else
                    <span style="color: #888;">-</span>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>


        </table>
    </div>

<div class="button-container">
    <a href="{{ route('/admin/landingadmin') }}" class="back-link">Kembali</a>
</div>

</div>

</body>
</html>
