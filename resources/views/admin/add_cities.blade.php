<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tempat</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f8;
            padding: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .message, .error-list {
            max-width: 400px;
            margin: 10px auto;
        }

        .message {
            color: green;
            text-align: center;
        }

        .error-list {
            color: red;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
<body>
    <h1>Tambah Tempat</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cities.store') }}">
        @csrf
        <label for="name">Nama Tempat:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('/admin/landingadmin') }}" class="login-link">Kembali</a>
</body>
</html>
