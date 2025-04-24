<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
/* Reset dan Styling Dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: linear-gradient(135deg, #007BFF, #0056b3);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

/* Navbar */
.navbar {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background: #0056b3; /* Warna solid tanpa efek blur */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: fixed;
    top: 0;
    left: 0;
}

.navbar .logo {
    font-size: 22px;
    font-weight: bold;
}

.nav-links {
    list-style: none;
    display: flex;
    align-items: center;
}

.nav-links li {
    margin-left: 20px;
}

.nav-links a,
.nav-links button {
    text-decoration: none;
    color: white;
    padding: 10px 15px;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
    background-color: #ffb400;
    border: none;
    cursor: pointer;
}

.nav-links a:hover,
.nav-links button:hover {
    background-color: #ff9500;
    transform: scale(1.05);
}

/* Container */
.container {
    text-align: center;
    margin-top: 100px; /* Tambahkan margin supaya tidak ketutup navbar */
}


    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Admin Panel</div>
        <ul class="nav-links">
        <li>
            @if(Auth::user()->role === 'AdminUtama')
                <a href="{{ route('/admin/bus-table') }}">Tabel Bus</a>
            @endif
        </li>
        <li>
            @if(Auth::user()->role === 'Admin')
                <a href="{{ route('/admin/bus-table') }}">Tabel Bus</a>
            @endif
        </li>
        <li>
            @if(Auth::user()->role === 'AdminUtama')
                <a href="{{ route('/admin/admin.add') }}">Tambah Admin</a>
            @endif
        </li>
        <li>
            @if(Auth::user()->role === 'AdminUtama')
                <a href="{{ route('/admin/add_cities') }}">Tambah Tempat</a>
            @endif
        </li>

        
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>Selamat datang, {{ Auth::user()->nama }}!</h1>
    </div>
</body>
</html>
