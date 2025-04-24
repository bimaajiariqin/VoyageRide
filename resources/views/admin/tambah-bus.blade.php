<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Bus</title>
    <style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #e0eafc, #cfdef3);
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 650px;
        margin: auto;
        background: #fff;
        padding: 35px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    label {
        display: block;
        margin-top: 18px;
        margin-bottom: 6px;
        color: #34495e;
        font-weight: 600;
    }

    input[type="text"],
    input[type="number"],
    input[type="datetime-local"],
    input[list] {
        width: 100%;
        padding: 12px 14px;
        border-radius: 10px;
        border: 1px solid #d1d1d1;
        box-sizing: border-box;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #fdfdfd;
    }

    input:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0,123,255,0.2);
        background: #fff;
    }

    input[type="checkbox"] {
        margin-right: 8px;
    }

    h4 {
        margin-top: 24px;
        color: #2d3e50;
    }

    .success-message {
        background-color: #d4edda;
        color: #155724;
        padding: 12px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        border: 1px solid #c3e6cb;
    }

    button {
        margin-top: 25px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 14px;
        width: 100%;
        font-size: 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s;
    }

    button:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
    }

    .login-link {
        display: block;
        margin-top: 20px;
        text-align: center;
        color: #007bff;
        text-decoration: none;
        font-weight: 500;
    }

    .login-link:hover {
        text-decoration: underline;
    }
</style>

</head>
<body>

<div class="container">
    <h1>Tambah Bus</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('bus.store') }}" method="POST">
        @csrf

        <label>Nama Bus:</label>
        <input type="text" name="name" required>

        <label>Jenis Bus:</label>
        <input type="text" name="bus_type" required>

        <label>Kapasitas Kursi:</label>
        <input type="number" name="seat_capacity" required>

        <label>Nomor Bus:</label>
        <input type="text" name="bus_number" required>

        <label>Model Bus:</label>
        <input type="text" name="model" required>

        <label>Logo URL:</label>
        <input type="text" name="logo_url">

        <label>Asal:</label>
<input list="origin-options" id="origin_input" required placeholder="Ketik kota asal">
<input type="hidden" name="origin_id" id="origin_id">

<datalist id="origin-options">
    @foreach($cities as $city)
        <option data-id="{{ $city->id }}" value="{{ $city->name }}"></option>
    @endforeach
</datalist>

<label>Tujuan:</label>
<input list="destination-options" id="destination_input" required placeholder="Ketik kota tujuan">
<input type="hidden" name="destination_id" id="destination_id">

<datalist id="destination-options">
    @foreach($cities as $city)
        <option data-id="{{ $city->id }}" value="{{ $city->name }}"></option>
    @endforeach
</datalist>



        <label>Waktu Keberangkatan:</label>
        <input type="datetime-local" name="departure_time" required>

        <label>Waktu Kedatangan:</label>
        <input type="datetime-local" name="arrival_time" required>

        <label>Harga:</label>
        <input type="number" name="price" step="0.01" required>

        <h4>Fasilitas:</h4>
        <label><input type="checkbox" name="has_luggage"> Bagasi</label>
        <label><input type="checkbox" name="has_light"> Lampu</label>
        <label><input type="checkbox" name="has_ac"> AC</label>
        <label><input type="checkbox" name="has_drink"> Minuman</label>
        <label><input type="checkbox" name="has_wifi"> WiFi</label>
        <label><input type="checkbox" name="has_usb"> USB Charger</label>
        <label><input type="checkbox" name="has_cctv"> CCTV</label>

        <button type="submit">Simpan</button>
    </form>
    
    <a href="{{ route('/admin/landingadmin') }}" class="login-link">Kembali</a>
</div>

</body>
</html>

<script>
    function setupCityInput(inputId, hiddenId, datalistId) {
        const input = document.getElementById(inputId);
        const hidden = document.getElementById(hiddenId);
        const options = document.getElementById(datalistId).options;

        input.addEventListener('input', () => {
            let found = false;
            for (let i = 0; i < options.length; i++) {
                if (options[i].value === input.value) {
                    hidden.value = options[i].dataset.id;
                    found = true;
                    break;
                }
            }
            if (!found) hidden.value = ""; // Kosongkan jika nama kota tidak cocok
        });
    }

    setupCityInput('origin_input', 'origin_id', 'origin-options');
    setupCityInput('destination_input', 'destination_id', 'destination-options');
</script>
