@extends('admin.template')

@section('title', 'Dashboard | Day Dream Admin')
@section('page-title', 'Dashboard Admin')
@section('page-subtitle', 'Overview awal untuk admin panel Day Dream Donuts & Coffee.')

@section('content')

    <div class="content-card welcome-card">
        <h3>Selamat Datang di Day Dream Admin Panel</h3>

        <p>
            Halaman ini merupakan tampilan awal admin panel untuk memantau data utama website Day Dream Donuts & Coffee,
            mulai dari data products, data users, hingga data orders yang akan dikembangkan pada tahap berikutnya.
        </p>

        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>

                    <div>
                        <h3>{{ $totalProducts ?? 0 }}</h3>
                        <p>Data Products</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>
                        <h3>{{ $totalUsers ?? 0 }}</h3>
                        <p>Data Users</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="bi bi-receipt-cutoff"></i>
                    </div>

                    <div>
                        <h3>{{ $totalOrders ?? 0 }}</h3>
                        <p>Orders</p>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('styles')
    <style>
        .welcome-card {
            min-height: 360px;
            position: relative;
            overflow: hidden;
            background:
                linear-gradient(135deg, rgba(255, 255, 255, 0.96), rgba(255, 247, 236, 0.96)),
                url('https://images.unsplash.com/photo-1551024601-bec78aea704b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
        }

        .welcome-badge {
            display: inline-flex;
            align-items: center;
            background: #ffe3e5;
            color: #d9232e;
            padding: 9px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .welcome-card h3 {
            color: #5a2d18;
            font-size: 36px;
            font-weight: 800;
            margin-bottom: 14px;
            max-width: 720px;
        }

        .welcome-card p {
            color: #7b5a46;
            line-height: 1.8;
            max-width: 780px;
            margin-bottom: 28px;
        }

        .stats-card {
            height: 100%;
            background: #ffffff;
            border: 1px solid rgba(217, 35, 46, 0.12);
            border-radius: 28px;
            padding: 26px;
            display: flex;
            align-items: center;
            gap: 18px;
            box-shadow: 0 16px 40px rgba(90, 45, 24, 0.06);
            transition: 0.25s ease;
        }

        .stats-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 55px rgba(217, 35, 46, 0.12);
        }

        .stats-icon {
            width: 64px;
            height: 64px;
            border-radius: 22px;
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            box-shadow: 0 14px 30px rgba(217, 35, 46, 0.24);
            flex-shrink: 0;
        }

        .stats-card h3 {
            margin: 0;
            color: #5a2d18;
            font-size: 34px;
            font-weight: 800;
        }

        .stats-card p {
            margin: 2px 0 0;
            color: #7b5a46;
            font-weight: 600;
        }

        .admin-menu-preview {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-top: 10px;
        }

        .preview-item {
            background: #ffffff;
            border: 1px solid rgba(217, 35, 46, 0.1);
            border-radius: 24px;
            padding: 24px;
            box-shadow: 0 14px 35px rgba(90, 45, 24, 0.06);
            text-decoration: none;
            transition: 0.25s ease;
        }

        .preview-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 48px rgba(217, 35, 46, 0.12);
        }

        .preview-item i {
            color: #d9232e;
            font-size: 30px;
            margin-bottom: 16px;
            display: inline-block;
        }

        .preview-item h5 {
            color: #5a2d18;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .preview-item p {
            color: #7b5a46;
            line-height: 1.6;
            margin: 0;
            font-size: 14px;
        }

        .disabled-preview {
            opacity: 0.82;
            cursor: default;
        }

        .disabled-preview:hover {
            transform: none;
        }

        @media (max-width: 991px) {
            .admin-menu-preview {
                grid-template-columns: 1fr;
            }

            .welcome-card h3 {
                font-size: 30px;
            }
        }
    </style>
@endpush
