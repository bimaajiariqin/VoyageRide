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
    background-color: #f2f7ff;
}

.profile-container {
    max-width: 480px;
    margin: 50px auto;
    text-align: center;
}

.profile-title {
    color: #3a4f7a;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 25px;
    position: relative;
}

.profile-title:after {
    content: "";
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 3px;
    background: linear-gradient(to right, #3a4f7a, #7091da);
    border-radius: 3px;
}

.profile-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
}

.avatar-container {
    margin-bottom: 20px;
}

.avatar {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #3a4f7a, #7091da);
    color: white;
    font-size: 36px;
    font-weight: 500;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-transform: uppercase;
    box-shadow: 0 4px 15px rgba(58, 79, 122, 0.3);
}

.profile-info {
    margin-bottom: 25px;
    text-align: left;
}

.info-item {
    padding: 12px 0;
    border-bottom: 1px solid #eaedf5;
    margin: 0;
    color: #4a5568;
    display: flex;
    align-items: center;
}

.info-item:last-child {
    border-bottom: none;
}

.info-item i {
    color: #7091da;
    margin-right: 10px;
    font-size: 16px;
    width: 20px;
    text-align: center;
}

.info-item strong {
    font-weight: 500;
    margin-right: 5px;
    color: #3a4f7a;
    flex: 0 0 60px;
}

.info-item span {
    flex: 1;
}

.logout-btn {
    background: linear-gradient(to right, #e74c3c, #c0392b);
    color: white;
    border: none;
    padding: 12px 25px;
    margin-top: 10px;
    cursor: pointer;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.logout-btn i {
    margin-left: 8px;
}

.logout-btn:hover {
    background: linear-gradient(to right, #c0392b, #e74c3c);
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
}

.logout-btn:active {
    transform: translateY(1px);
    box-shadow: 0 2px 10px rgba(231, 76, 60, 0.4);
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
        width: 70px;
        height: 70px;
        font-size: 28px;
    }
    
    .profile-title {
        font-size: 24px;
    }
}
</style>