<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Day Dream Donuts & Coffee')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" href="https://www.jcodonuts.com/favicon.ico" type="image/x-icon">

    <style>
        :root {
            --jco-red: #d9232e;
            --jco-red-dark: #a71d24;
            --jco-cream: #fff7ec;
            --jco-brown: #5a2d18;
            --jco-orange: #ffb347;
            --jco-soft-red: #ffe3e5;
            --jco-white: #ffffff;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(180deg, #fff7ec 0%, #ffffff 45%, #fff1dc 100%);
            color: var(--jco-brown);
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            background: rgba(255, 255, 255, 0.92) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 24px rgba(217, 35, 46, 0.08);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            gap: 12px;
        }

        .navbar-brand img {
            height: 52px;
            width: 52px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--jco-soft-red);
            box-shadow: 0 6px 16px rgba(217, 35, 46, 0.18);
        }

        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.1;
        }

        .brand-title {
            font-size: 22px;
            font-weight: 800;
            color: var(--jco-red);
            letter-spacing: -0.5px;
        }

        .brand-subtitle {
            font-size: 12px;
            font-weight: 500;
            color: #8a5a44;
        }

        .nav-link {
            color: var(--jco-brown) !important;
            font-weight: 700;
            margin: 0 6px;
            padding: 10px 16px !important;
            border-radius: 999px;
            transition: all 0.25s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: var(--jco-soft-red);
            color: var(--jco-red) !important;
            transform: translateY(-2px);
        }

        .btn-jco {
            background: linear-gradient(135deg, var(--jco-red), #ff4b55);
            color: white;
            border: none;
            border-radius: 999px;
            padding: 10px 20px;
            font-weight: 700;
            box-shadow: 0 8px 20px rgba(217, 35, 46, 0.25);
            transition: all 0.25s ease;
        }

        .btn-jco:hover {
            background: linear-gradient(135deg, var(--jco-red-dark), var(--jco-red));
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(217, 35, 46, 0.32);
        }

        .navbar-toggler {
            border: none;
            box-shadow: none !important;
            background-color: var(--jco-soft-red);
            border-radius: 12px;
            padding: 8px 10px;
        }

        /* BACKGROUND DEKORASI */
        .page-wrapper {
            position: relative;
            min-height: calc(100vh - 80px);
        }

        .bubble {
            position: fixed;
            border-radius: 50%;
            opacity: 0.45;
            z-index: -1;
            filter: blur(1px);
        }

        .bubble-1 {
            width: 180px;
            height: 180px;
            background: #ffd6da;
            top: 120px;
            left: -70px;
        }

        .bubble-2 {
            width: 240px;
            height: 240px;
            background: #ffe0ad;
            bottom: 80px;
            right: -110px;
        }

        .bubble-3 {
            width: 90px;
            height: 90px;
            background: #ffd1a3;
            top: 55%;
            left: 6%;
        }

        main {
            min-height: 70vh;
        }

        /* FOOTER */
        .footer-jco {
            margin-top: 60px;
            background: linear-gradient(135deg, var(--jco-red), #b81722);
            color: white;
            border-radius: 35px 35px 0 0;
            padding: 34px 0 24px;
            box-shadow: 0 -10px 28px rgba(217, 35, 46, 0.18);
        }

        .footer-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .footer-brand img {
            width: 54px;
            height: 54px;
            object-fit: cover;
            border-radius: 50%;
            background: white;
            padding: 4px;
        }

        .footer-title {
            font-size: 20px;
            font-weight: 800;
        }

        .footer-subtitle {
            font-size: 13px;
            opacity: 0.9;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            margin-left: 16px;
            opacity: 0.9;
            transition: 0.2s;
        }

        .footer-links a:hover {
            opacity: 1;
            text-decoration: underline;
        }

        .footer-copy {
            margin-top: 18px;
            font-size: 13px;
            opacity: 0.85;
            text-align: center;
        }

        @media (max-width: 991px) {
            .navbar-collapse {
                margin-top: 16px;
                background: white;
                border-radius: 22px;
                padding: 14px;
                box-shadow: 0 10px 24px rgba(217, 35, 46, 0.08);
            }

            .nav-link {
                margin: 4px 0;
            }

            .btn-jco {
                width: 100%;
                margin-top: 8px;
            }
        }

        @media (max-width: 576px) {
            .brand-title {
                font-size: 18px;
            }

            .brand-subtitle {
                font-size: 11px;
            }

            .navbar-brand img {
                height: 46px;
                width: 46px;
            }

            .footer-card {
                text-align: center;
                justify-content: center;
            }

            .footer-brand {
                justify-content: center;
            }

            .footer-links a {
                margin: 0 8px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            {{-- LOGO & BRAND --}}
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo ">

                <div class="brand-text">
                    <span class="brand-title">Day Dream Donuts & Coffee</span>
                    <span class="brand-subtitle">Coffee • Donuts • Happiness</span>
                </div>
            </a>

            {{-- TOGGLER MOBILE --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- MENU --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('products') ? 'active' : '' }}"
                            href="{{ url('/products') }}">
                            Products
                        </a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a href="{{ url('/products') }}" class="btn btn-jco">
                            Order Now
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="page-wrapper">
        {{-- Dekorasi background --}}
        <div class="bubble bubble-1"></div>
        <div class="bubble bubble-2"></div>
        <div class="bubble bubble-3"></div>

        <main>
            @yield('content')
        </main>
    </div>

    <footer class="footer-jco">
        <div class="container">
            <div class="footer-card">
                <div class="footer-brand">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo ">

                    <div>
                        <div class="footer-title">Day dream Donuts & Coffee</div>
                        <div class="footer-subtitle">
                            Fresh donuts, cozy coffee, and sweet moments every day.
                        </div>
                    </div>
                </div>

                <div class="footer-links">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ url('/products') }}">Products</a>
                    <a href="{{ url('/admin') }}">Admin</a>
                </div>
            </div>

            <div class="footer-copy">
                &copy; {{ date('Y') }} Day Dream Donuts & Coffee. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>

</html>
