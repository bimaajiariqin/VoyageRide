<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoyageRide - @yield('title', 'Bus Pariwisata')</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* CSS styles from your original code */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background-color: #006064;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .logo {
            height: 40px;
        }
        
        .nav-links {
            display: flex;
            gap: 20px;
            margin-right: auto;
            margin-left: 40px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #f5f5f5;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        
        .nav-links a:hover {

            color: #f5f5f5;
        }
        
        .profile-icon {
            cursor: pointer;
        }
        
        /* Search Bar Section */
/* Search Bar Section */
.search-container {
    background-color: #006064;
    padding: 30px 0;
}

.search-bar {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-end;
    gap: 15px;
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.search-input,
.date-input {
    flex: 1 1 180px;
    display: flex;
    flex-direction: column;
}

.search-input label,
.date-input label {
    font-size: 13px;
    color: #444;
    margin-bottom: 6px;
    font-weight: 500;
}

.search-input input,
.date-input input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 14px;
    transition: border 0.3s ease, box-shadow 0.3s ease;
}

.search-input input:focus,
.date-input input:focus {
    outline: none;
    border-color: #00A5B5;
    box-shadow: 0 0 0 3px rgba(0, 165, 181, 0.2);
}

/* Tombol swap berbentuk lingkaran dan tanpa animasi */
.swap-button {
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 22px;
}

.swap-button button {
    width: 40px;
    height: 40px;
    background: #eee;
    border: none;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
}

.swap-button button:hover {
    background: #ddd;
}

.search-button {
    background-color: #00A5B5;
    color: white;
    border: none;
    padding: 12px 22px;
    border-radius: 10px;
    font-weight: bold;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.search-button:hover {
    background-color: #008A97;
    transform: translateY(-2px);
}




        
        .steps-section {
            padding: 40px 20px;
            background-color: white;
        }
        
        .steps-title {
            text-align: center;
            color: #006064;
            margin-bottom: 30px;
        }
        
        .steps-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            gap: 20px;
        }
        
        .step {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #f9f9f9;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .step:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .benefit-icon {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }
        
        .step-number {
            background-color: #006064;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .step-text {
            text-align: center;
            line-height: 1.5;
        }
        
        .benefits-section {
            padding: 60px 20px;
            background-color: #006064;
            position: relative;
        }
        
        .promise-badge {
            position: absolute;
            top: -30px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .benefits-title {
            text-align: center;
            color: #f5f5f5;
            margin-bottom: 40px;
        }
        
        .benefits-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            gap: 30px;
        }
        
        .benefit {
            flex: 1;
            background-color: white;
            padding: 30px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .benefit:hover {
            transform: translateY(-10px);
        }
        
        .benefit div {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .benefit-title {
            margin: 0;
            color: #006064;
            font-size: 1.2em;
        }
        
        .benefit-text {
            margin: 0;
            color: #757575;
            line-height: 1.5;
        }
        
        .main-content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .main-title {
            color: #006064;
            margin-bottom: 20px;
        }
        
        .main-text {
            line-height: 1.6;
            color: #555;
            margin-bottom: 20px;
        }
        
        .read-more {
            color: #006064;
            text-decoration: none;
            font-weight: bold;
        }
        
        .promo-section {
            background-color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }
        
        .promo-title {
            color: #006064;
            margin-bottom: 15px;
        }
        
        .promo-text {
            color: #555;
            max-width: 800px;
            margin: 0 auto 30px;
        }
        
        .promo-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
            background-color: #;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .promo-info {
            text-align: left;
        }
        
        .promo-logo {
            height: 40px;
            margin-bottom: 15px;
        }
        
        .promo-headline {
            color: #006064;
            margin: 0 0 10px;
        }
        
        .promo-discount {
            font-size: 1.5em;
            font-weight: bold;
            color: #D50000;
            margin: 0 0 10px;
        }
        
        .promo-details {
            color: #757575;
            margin: 0;
        }
        
        .promo-button {
            background-color: #006064;
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .promo-button:hover {
            background-color: #00796B;
        }
        
        .footer {
            background-color: #006064;
            color: white;
            padding: 40px 20px;
        }
        
        .footer-content {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Membuat konten rata kiri */
    text-align: left; /* Memastikan teks juga rata kiri */
}

.footer {
    background-color: #005766;
    color: #fff;
    padding: 40px 20px;
    display: flex;
    justify-content: center;
}

.footer-content {
    max-width: 1100px; /* Batasi lebar maksimum agar sejajar dengan konten utama */
    width: 100%;
    text-align: left;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.footer-text {
    font-size: 14px;
    line-height: 1.6;
    max-width: 600px; /* Batasi lebar teks agar tidak melebar */
    margin-bottom: 20px;
}

.footer-icons {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.footer-icons a {
    font-size: 24px;
    color: #fff;
    text-decoration: none;
}
        
        .footer-logo {
            height: 50px;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
        }
        
        .footer-text {
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}
        
        .social-links {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .social-icon {
            width: 30px;
            height: 30px;
            fill: white;
            transition: transform 0.3s;
        }
        
        .social-icon:hover {
            transform: scale(1.2);
        }
        
        .copyright {
            margin: 0;
            font-size: 0.9em;
            opacity: 0.8;
        }
        
        /* Search Results Page Styles */
        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            gap: 20px;
        }
        
        .sidebar {
            width: 250px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        
        .sidebar-section {
            margin-bottom: 30px;
        }
        
        .sidebar-heading {
            color: #006064;
            font-size: 1.2em;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar-menu li {
            margin-bottom: 10px;
        }
        
        .sidebar-menu a {
            text-decoration: none;
            color: #555;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: color 0.3s;
        }
        
        .sidebar-menu a:hover {
            color: #006064;
        }
        
        .main-content {
            flex: 1;
        }
        
        .search-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 15px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .search-item {
            display: flex;
            flex-direction: column;
        }
        
        .search-label {
            font-size: 0.9em;
            color: #757575;
            margin-bottom: 5px;
        }
        
        .search-value {
            font-weight: bold;
            color: #006064;
        }
        
        .search-button {
            background-color: #006064;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .search-button:hover {
            background-color: #00796B;
        }
        
        .results-header {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #006064;
        }
        
        .bus-card {
            display: flex;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .bus-logo {
            width: 120px;
            height: 120px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
        }
        
        .bus-logo img {
            max-width: 100%;
            max-height: 100%;
        }
        
        .bus-details {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }
        
        .bus-info {
            flex: 1;
        }
        
        .bus-name {
            font-size: 1.2em;
            font-weight: bold;
            color: #006064;
            margin-bottom: 5px;
        }
        
        .bus-type {
            color: #757575;
            margin-bottom: 15px;
        }
        
        .bus-number {
            margin-bottom: 15px;
            color: #333;
        }
        
        .bus-time {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 5px;
            margin-bottom: 15px;
        }
        
        .time {
            font-weight: bold;
        }
        
        .time-separator {
            margin: 0 5px;
            color: #757575;
        }
        
        .bus-features {
            display: flex;
            gap: 10px;
            color: #006064;
        }
        
        .divider {
            width: 1px;
            background-color: #e0e0e0;
            margin: 0 20px;
        }
        
        .bus-price {
            text-align: right;
            margin-bottom: 20px;
        }
        
        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #D50000;
        }
        
        .reschedule-button {
            display: inline-block;
            background-color: #006064;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        
        .reschedule-button:hover {
            background-color: #00796B;
        }

        /* Additional responsive styles */
        @media (max-width: 768px) {
            .steps-container, .benefits-container {
                flex-direction: column;
            }
            
            .bus-details {
                flex-direction: column;
            }
            
            .divider {
                width: 100%;
                height: 1px;
                margin: 20px 0;
            }
            
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                margin-bottom: 20px;
            }
        }
        
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a href="{{ route('landing') }}">
            <img src="{{ asset('Logo VoyageRide.png') }}" alt="VoyageRide Logo" class="logo">
        </a>
        <div class="nav-links">
            <a href="{{ route('landing') }}">Bis AKAP</a>
            <a href="{{ route('booking') }}">Pemesanan</a>
        </div>
        <a href="{{ route('profil') }}">
        <div class="profile-icon" >
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f5f5f5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </div>
    </a>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <img src="{{ asset('Logo VoyageRide.png') }}" alt="VoyageRide Logo" class="footer-logo">
            <p class="footer-text">
            VoyageRide adalah jasa pemesanan bis AKAP secara online. 
            Telah dipercaya lebih dari 25 juta pelanggan secara global. 
            VoyageRide menawarkan pemesanan bis melalui website rute-rute utama di Indonesia.
        </p>
            <div class="social-links">
                <!-- Twitter Icon -->
                <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                </svg>
                
                <!-- Instagram Icon -->
                <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
                
               <!-- Email Icon -->
                <svg class="social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                </svg>
            </div>
            <p class="copyright">© 2025 VoyageRide, Inc. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
