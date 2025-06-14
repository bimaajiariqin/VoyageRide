<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Times New Roman', serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            width: 600px;
            height: 350px;
            background-color: #005b6b;
            border-radius: 10px;
            overflow: hidden;
        }

        .left-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #005b6b;
        }

        .logo {
            font-size: 50px;
            font-weight: bold;
            color: #fdf5e6;
            width: 100px;
            height: auto;
        }

        .right-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #005b6b;
            padding: 20px;
        }

        h2 {
            color: #fdf5e6;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        input {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #fdf5e6;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-link {
            margin-top: 10px;
            color: #fdf5e6;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src="{{ asset('/Logo VoyageRide.png') }}" alt="Logo" class="logo">
        </div>        
        <div class="right-panel">
            <h2>Tambah Admin</h2>
            
            @if(session('success'))
                <p style="color: green;">{{ session('success') }}</p>
            @endif
            
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf
                <input type="text" name="nama" placeholder="Nama" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Tambah Admin</button>
            </form>
            
            <a href="{{ route('/admin/landingadmin') }}" class="login-link">Kembali</a>
        </div>
    </div>
</body>
</html>
