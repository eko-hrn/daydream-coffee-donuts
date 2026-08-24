<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Day Dream Admin')</title>

    {{-- Bootstrap Lokal --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">

    {{-- DataTables Lokal --}}
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/other/datatables.min.css') }}">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --jco-red: #d9232e;
            --jco-dark-red: #a71d24;
            --jco-cream: #fff7ec;
            --jco-soft-red: #ffe3e5;
            --jco-brown: #5a2d18;
            --jco-text: #7b5a46;
            --jco-border: rgba(217, 35, 46, 0.12);
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background: linear-gradient(180deg, #fff7ec 0%, #ffffff 55%, #fff1dc 100%);
            color: var(--jco-brown);
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #ffffff, #fff4e5);
            border-right: 1px solid var(--jco-border);
            padding: 24px 20px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            box-shadow: 8px 0 30px rgba(90, 45, 24, 0.07);
            z-index: 1000;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--jco-border);
            margin-bottom: 24px;
        }

        .brand img {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--jco-soft-red);
        }

        .brand h4 {
            margin: 0;
            color: var(--jco-red);
            font-weight: 800;
            font-size: 20px;
        }

        .brand span {
            color: var(--jco-text);
            font-size: 12px;
            font-weight: 600;
        }

        .menu-label {
            font-size: 12px;
            font-weight: 800;
            color: #b47b61;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding-left: 12px;
            margin-bottom: 12px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .menu-link {
            text-decoration: none;
            color: var(--jco-brown);
            font-weight: 700;
            padding: 13px 15px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: 0.25s ease;
        }

        .menu-link i {
            font-size: 18px;
        }

        .menu-link:hover,
        .menu-link.active {
            background: var(--jco-soft-red);
            color: var(--jco-red);
            transform: translateX(4px);
        }

        .sidebar-footer {
            position: absolute;
            left: 20px;
            right: 20px;
            bottom: 24px;
        }

        .visit-btn {
            width: 100%;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--jco-red), #ff4b55);
            color: white;
            text-decoration: none;
            font-weight: 800;
            padding: 12px 18px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 7px;
            box-shadow: 0 12px 26px rgba(217, 35, 46, 0.25);
        }

        .visit-btn:hover {
            color: white;
            background: linear-gradient(135deg, var(--jco-dark-red), var(--jco-red));
        }

        .main {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 28px;
        }

        .topbar {
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid var(--jco-border);
            border-radius: 28px;
            padding: 20px 24px;
            box-shadow: 0 16px 40px rgba(90, 45, 24, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .topbar h2 {
            margin: 0;
            color: var(--jco-brown);
            font-size: 26px;
            font-weight: 800;
        }

        .topbar p {
            margin: 4px 0 0;
            color: var(--jco-text);
            font-size: 14px;
        }

        .admin-profile {
            background: var(--jco-cream);
            border: 1px solid var(--jco-border);
            border-radius: 999px;
            padding: 10px 14px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: var(--jco-red);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-profile strong {
            display: block;
            font-size: 14px;
            color: var(--jco-brown);
        }

        .admin-profile span {
            display: block;
            font-size: 12px;
            color: var(--jco-text);
        }

        .content-card {
            background: white;
            border: 1px solid var(--jco-border);
            border-radius: 28px;
            padding: 28px;
            box-shadow: 0 16px 40px rgba(90, 45, 24, 0.06);
        }

        @media (max-width: 991px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .admin-layout {
                display: block;
            }

            .main {
                margin-left: 0;
                width: 100%;
                padding: 18px;
            }

            .sidebar-footer {
                position: static;
                margin-top: 24px;
            }

            .topbar {
                align-items: flex-start;
                gap: 16px;
            }

            .admin-profile {
                display: none;
            }
        }
    </style>

    @yield('styles')
    @stack('styles')
</head>

<body>

    <div class="admin-layout">

        <aside class="sidebar">
            <div class="brand">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo Day Dream">

                <div>
                    <h4>Day Dream Admin</h4>
                    <span>Management Panel</span>
                </div>
            </div>

            <div class="menu-label">Main Menu</div>

            <nav class="menu">
                <a href="{{ route('admin.dashboard') }}"
                    class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.products.index') }}"
                    class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam-fill"></i>
                    Data Products
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="menu-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-people-fill"></i>
                    Data Users
                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="menu-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                    <i class="bi bi-receipt-cutoff"></i>
                    Data Orders
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="{{ url('/') }}" class="visit-btn">
                    <i class="bi bi-globe2"></i>
                    Visit Website
                </a>
            </div>
        </aside>

        <main class="main">
            <div class="topbar">
                <div>
                    <h2>@yield('page-title', 'Dashboard')</h2>
                    <p>@yield('page-subtitle', 'Kelola data website Day Dream dari halaman admin.')</p>
                </div>

                <div class="admin-profile">
                    <div class="admin-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>

                    <div>
                        <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
                        <span>Website Manager</span>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST" class="m-0 ms-2">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill fw-bold">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            @yield('content')
        </main>

    </div>

    {{-- JQuery --}}
    <script src="{{ asset('bootstrap-5.3.8-dist/other/jquery-3.6.1.js') }}"></script>

    {{-- Bootstrap --}}
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- DataTables --}}
    <script src="{{ asset('bootstrap-5.3.8-dist/other/datatables.min.js') }}"></script>

    @yield('scripts')
    @stack('scripts')

</body>

</html>
