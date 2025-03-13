@extends('layout')

@section('content')
<div class="profile-container">
    <h2>Profil Pengguna</h2>
    <div class="profile-card">
        <p><strong>Nama:</strong> {{ $user->nama }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>
@endsection

<style>
.profile-container {
    max-width: 400px;
    margin: 50px auto;
    text-align: center;
}
.profile-card {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}
.logout-btn {
    background: #d9534f;
    color: white;
    border: none;
    padding: 10px 15px;
    margin-top: 15px;
    cursor: pointer;
    border-radius: 5px;
}
.logout-btn:hover {
    background: #c9302c;
}
</style>
