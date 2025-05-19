<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.side-logo {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #005b6b;
}

.logo {
    width: 100px;
    height: auto;
}

.login-form {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #005b6b;
    padding: 20px;
}

h1 {
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
    color: #005b6b;
}

.register-link {
    margin-top: 10px;
    color: #fdf5e6;
    cursor: pointer;
}

.register-link a {
    color: #fdf5e6; /* Warna yang sesuai dengan teks lainnya */
    text-decoration: none; /* Opsional: menghilangkan garis bawah */
}
    </style>
</head>
<body>
    <div class="container">
        <div class="side-logo">
            <img src="{{ asset('/Logo VoyageRide.png') }}" alt="Voyage Ride Logo" class="logo">
        </div>
        <div class="login-form">
            <h1>Login</h1>
            @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif
            <form method="POST" action="{{ route('logincontroller') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p class="register-link"><a href="{{ route('register') }}">Already have account? Register</a></p>
        </div>
    </div>
</body>
</html>
