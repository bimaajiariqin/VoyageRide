@extends('layout')

@section('content')
<div class="profile-container">
    <h2 class="profile-title">Profil Pengguna</h2>
    <div class="profile-card">
        <div class="avatar-container">
            <div class="avatar">{{ substr($user->nama, 0, 1) }}</div>
        </div>
        <div class="profile-info">
            <p class="info-item"><i class="fas fa-user"></i> <strong>Nama:</strong> <span>{{ $user->nama }}</span></p>
            <p class="info-item"><i class="fas fa-envelope"></i> <strong>Email:</strong> <span>{{ $user->email }}</span></p>
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout <i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div>
</div>
@endsection

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f6f8fc;
    margin: 0;
    padding: 0;
}

.profile-container {
    max-width: 480px;
    margin: 60px auto;
    text-align: center;
    padding: 0 15px;
}

.profile-title {
    color: #2c3e50;
    font-size: 26px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
}

.profile-title:after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: #6c8ed3;
    border-radius: 2px;
}

.profile-card {
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

.avatar-container {
    margin-bottom: 18px;
}

.avatar {
    width: 75px;
    height: 75px;
    background: linear-gradient(135deg, #4a6cb3, #6c8ed3);
    color: #fff;
    font-size: 34px;
    font-weight: 500;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(76, 103, 164, 0.3);
    text-transform: uppercase;
}

.profile-info {
    text-align: left;
    margin-bottom: 20px;
}

.info-item {
    display: flex;
    align-items: center;
    color: #444;
    padding: 10px 0;
    border-bottom: 1px solid #e5e9f2;
    font-size: 15px;
}

.info-item:last-child {
    border-bottom: none;
}

.info-item i {
    color: #6c8ed3;
    margin-right: 10px;
    font-size: 16px;
    width: 20px;
    text-align: center;
}

.info-item strong {
    font-weight: 500;
    margin-right: 6px;
    color: #2c3e50;
    flex: 0 0 60px;
}

.info-item span {
    flex: 1;
}

.logout-btn {
    background: linear-gradient(to right, #d9534f, #c9302c);
    color: white;
    border: none;
    padding: 12px 25px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 30px;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0.3px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(217, 83, 79, 0.3);
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.logout-btn i {
    margin-left: 8px;
}

.logout-btn:hover {
    background: linear-gradient(to right, #c9302c, #d9534f);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(217, 83, 79, 0.4);
}

.logout-btn:active {
    transform: translateY(1px);
    box-shadow: 0 2px 8px rgba(217, 83, 79, 0.4);
}

@media (max-width: 500px) {
    .profile-container {
        max-width: 95%;
        margin: 30px auto;
    }

    .profile-card {
        padding: 20px;
    }

    .avatar {
        width: 65px;
        height: 65px;
        font-size: 28px;
    }

    .profile-title {
        font-size: 22px;
    }
}

</style>