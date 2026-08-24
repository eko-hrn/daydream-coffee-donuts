@extends('layout.app')

@section('title', 'About | Day Dream Donuts & Coffee')

@section('content')

    {{-- ABOUT HERO --}}
    <section class="about-hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-badge">
                        About Day Dream Donuts & Coffee
                    </div>

                    <h1 class="about-hero-title">
                        Bringing Happiness Through
                        <span>Donuts, Coffee, and Warm Moments</span>
                    </h1>

                    <p class="about-hero-text">
                        Day Dream Donuts & Coffee hadir sebagai brand yang mengutamakan kualitas,
                        inovasi rasa, dan pengalaman pelanggan melalui sajian donut premium,
                        coffee pilihan, serta suasana yang nyaman untuk berbagai momen.
                    </p>

                    <div class="about-hero-actions">
                        <a href="{{ url('/products') }}" class="btn btn-jco btn-lg">
                            Explore Menu
                        </a>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-hero-image">
                        <img src="{{ asset('images/1.jpg') }}" alt="Day Dream Donuts">

                        <div class="about-floating-card">
                            <h4>Since 2025</h4>
                            <p>Delivering sweet experiences every day.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- COMPANY OVERVIEW --}}
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <div class="overview-image">
                        <img src="{{ asset('images/8.jpg') }}" alt="Donuts Display">
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="section-title">
                        <span>Our Story</span>
                        <h2>A Brand Built on Taste, Quality, and Experience</h2>
                    </div>

                    <p class="about-paragraph">
                        Day Dream Donuts & Coffee dikenal sebagai brand yang menghadirkan kombinasi
                        antara donut dengan cita rasa khas dan coffee yang dibuat untuk melengkapi
                        pengalaman pelanggan. Setiap produk dirancang tidak hanya untuk dinikmati,
                        tetapi juga untuk menciptakan momen yang berkesan.
                    </p>

                    <p class="about-paragraph">
                        Dengan konsep modern, hangat, dan mudah diterima berbagai kalangan,
                        Day Dream menjadi pilihan untuk bersantai, bekerja, berkumpul bersama teman,
                        hingga menikmati waktu bersama keluarga.
                    </p>

                    <div class="overview-points">
                        <div>
                            <strong>Premium Ingredients</strong>
                            <p>Menggunakan bahan pilihan untuk menjaga kualitas rasa.</p>
                        </div>

                        <div>
                            <strong>Consistent Service</strong>
                            <p>Menghadirkan pelayanan yang ramah dan nyaman.</p>
                        </div>

                        <div>
                            <strong>Modern Experience</strong>
                            <p>Memberikan suasana yang cocok untuk berbagai aktivitas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VISION MISSION --}}
    <section class="about-section vision-section">
        <div class="container">
            <div class="section-title text-center">
                <span>Vision & Mission</span>
                <h2>Creating Sweet Moments with Purpose</h2>
                <p>
                    Kami percaya bahwa makanan dan minuman yang baik mampu menciptakan
                    pengalaman yang lebih hangat, menyenangkan, dan bermakna.
                </p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-6">
                    <div class="vm-card">
                        <h4>Our Vision</h4>
                        <p>
                            Menjadi brand donuts dan coffee yang terus dipercaya pelanggan
                            melalui kualitas produk, inovasi rasa, dan pengalaman yang konsisten.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="vm-card">
                        <h4>Our Mission</h4>
                        <p>
                            Menghadirkan produk berkualitas, pelayanan yang hangat, serta suasana
                            modern yang dapat dinikmati oleh pelanggan dalam setiap kesempatan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- VALUES --}}
    <section class="about-section">
        <div class="container">
            <div class="section-title text-center">
                <span>Our Values</span>
                <h2>What Makes Day Dream Special</h2>
                <p>
                    Nilai utama kami menjadi dasar dalam menghadirkan produk dan pengalaman
                    terbaik bagi pelanggan.
                </p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <h5>Quality</h5>
                        <p>
                            Menjaga standar rasa, bahan, dan tampilan produk agar tetap premium
                            dan konsisten.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <h5>Innovation</h5>
                        <p>
                            Terus menghadirkan pilihan rasa dan konsep produk yang relevan
                            dengan selera pelanggan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <h5>Experience</h5>
                        <p>
                            Menciptakan suasana yang menyenangkan untuk menikmati donut,
                            coffee, dan momen kebersamaan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- EXPERIENCE BANNER --}}
    <section class="experience-section">
        <div class="container">
            <div class="experience-card">
                <div class="row align-items-center g-4">
                    <div class="col-lg-7">
                        <span>Day Dream Experience</span>
                        <h2>Not Just a Place to Eat, But a Place to Enjoy Moments</h2>
                        <p>
                            Dari pilihan donut yang lembut, coffee yang hangat, hingga suasana
                            yang nyaman, Day Dream hadir untuk menemani momen santai, produktif,
                            dan kebersamaan Anda.
                        </p>
                    </div>

                    <div class="col-lg-5">
                        <div class="experience-stats">
                            <div>
                                <h4>2005</h4>
                                <p>Established</p>
                            </div>

                            <div>
                                <h4>Fresh</h4>
                                <p>Daily Made</p>
                            </div>

                            <div>
                                <h4>Premium</h4>
                                <p>Quality Taste</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .about-hero {
            padding: 90px 0 80px;
        }

        .about-badge {
            display: inline-flex;
            background: #ffe3e5;
            color: #d9232e;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: 0.3px;
        }

        .about-hero-title {
            font-size: 54px;
            line-height: 1.08;
            font-weight: 800;
            color: #5a2d18;
            letter-spacing: -1.7px;
            margin-bottom: 24px;
        }

        .about-hero-title span {
            color: #d9232e;
        }

        .about-hero-text {
            font-size: 18px;
            line-height: 1.9;
            color: #7b5a46;
            margin-bottom: 34px;
            max-width: 600px;
        }

        .about-hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-outline-jco {
            border: 2px solid #d9232e;
            color: #d9232e;
            border-radius: 999px;
            padding: 10px 24px;
            font-weight: 800;
            background: transparent;
        }

        .btn-outline-jco:hover {
            background: #d9232e;
            color: white;
        }

        .about-hero-image {
            position: relative;
            background: white;
            padding: 18px;
            border-radius: 38px;
            box-shadow: 0 26px 65px rgba(90, 45, 24, 0.14);
        }

        .about-hero-image img {
            width: 100%;
            height: 530px;
            object-fit: cover;
            border-radius: 30px;
        }

        .about-floating-card {
            position: absolute;
            left: -18px;
            bottom: 54px;
            background: rgba(255, 255, 255, 0.96);
            padding: 22px 24px;
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(90, 45, 24, 0.16);
            max-width: 260px;
            border: 1px solid rgba(217, 35, 46, 0.08);
        }

        .about-floating-card h4 {
            color: #d9232e;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .about-floating-card p {
            color: #7b5a46;
            margin: 0;
            line-height: 1.6;
        }

        .about-section {
            padding: 85px 0;
        }

        .overview-image {
            border-radius: 34px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(90, 45, 24, 0.13);
        }

        .overview-image img {
            width: 100%;
            height: 520px;
            object-fit: cover;
        }

        .section-title span,
        .experience-card span {
            color: #d9232e;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.3px;
        }

        .section-title h2,
        .experience-card h2 {
            color: #5a2d18;
            font-size: 42px;
            font-weight: 800;
            margin-top: 10px;
            margin-bottom: 18px;
            letter-spacing: -1px;
        }

        .section-title p {
            max-width: 720px;
            margin: 0 auto;
            color: #7b5a46;
            line-height: 1.8;
        }

        .about-paragraph {
            color: #7b5a46;
            line-height: 1.9;
            font-size: 16px;
            margin-bottom: 18px;
        }

        .overview-points {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            margin-top: 30px;
        }

        .overview-points div {
            background: white;
            padding: 20px 22px;
            border-radius: 22px;
            box-shadow: 0 14px 35px rgba(90, 45, 24, 0.07);
            border-left: 5px solid #d9232e;
        }

        .overview-points strong {
            display: block;
            color: #5a2d18;
            font-size: 17px;
            margin-bottom: 6px;
        }

        .overview-points p {
            color: #7b5a46;
            margin: 0;
            line-height: 1.6;
        }

        .vision-section {
            background: rgba(255, 255, 255, 0.45);
        }

        .vm-card {
            height: 100%;
            background: white;
            padding: 38px;
            border-radius: 30px;
            box-shadow: 0 18px 45px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
            transition: 0.25s ease;
        }

        .vm-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 60px rgba(217, 35, 46, 0.12);
        }

        .vm-number {
            width: 62px;
            height: 62px;
            border-radius: 20px;
            background: #ffe3e5;
            color: #d9232e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .vm-card h4 {
            color: #5a2d18;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .vm-card p {
            color: #7b5a46;
            line-height: 1.8;
            margin: 0;
        }

        .value-card {
            height: 100%;
            background: white;
            padding: 34px;
            border-radius: 28px;
            box-shadow: 0 16px 42px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
            transition: 0.25s ease;
        }

        .value-card:hover {
            transform: translateY(-8px);
        }

        .value-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 22px;
            box-shadow: 0 12px 28px rgba(217, 35, 46, 0.22);
        }

        .value-card h5 {
            color: #5a2d18;
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 12px;
        }

        .value-card p {
            color: #7b5a46;
            line-height: 1.8;
            margin: 0;
        }

        .experience-section {
            padding: 40px 0 95px;
        }

        .experience-card {
            background: linear-gradient(135deg, #ffffff, #fff1dc);
            border-radius: 36px;
            padding: 50px;
            box-shadow: 0 24px 65px rgba(90, 45, 24, 0.12);
            border: 1px solid rgba(217, 35, 46, 0.08);
            position: relative;
            overflow: hidden;
        }

        .experience-card::before {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            background: #ffe3e5;
            border-radius: 50%;
            right: -90px;
            top: -90px;
            opacity: 0.8;
        }

        .experience-card h2,
        .experience-card p,
        .experience-card span,
        .experience-stats {
            position: relative;
            z-index: 2;
        }

        .experience-card p {
            color: #7b5a46;
            line-height: 1.8;
            margin: 0;
        }

        .experience-stats {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        .experience-stats div {
            background: white;
            padding: 22px;
            border-radius: 24px;
            box-shadow: 0 14px 35px rgba(90, 45, 24, 0.08);
        }

        .experience-stats h4 {
            color: #d9232e;
            font-weight: 800;
            margin-bottom: 4px;
            font-size: 28px;
        }

        .experience-stats p {
            color: #7b5a46;
            font-weight: 600;
            margin: 0;
        }

        @media (max-width: 991px) {
            .about-hero {
                padding: 65px 0 50px;
            }

            .about-hero-title {
                font-size: 42px;
            }

            .about-hero-image img {
                height: 430px;
            }

            .about-floating-card {
                display: none;
            }

            .section-title h2,
            .experience-card h2 {
                font-size: 34px;
            }

            .overview-image img {
                height: 420px;
            }
        }

        @media (max-width: 576px) {
            .about-hero-title {
                font-size: 34px;
            }

            .about-hero-text {
                font-size: 16px;
            }

            .about-hero-actions .btn {
                width: 100%;
            }

            .about-hero-image img {
                height: 330px;
            }

            .about-section {
                padding: 60px 0;
            }

            .section-title h2,
            .experience-card h2 {
                font-size: 30px;
            }

            .experience-card {
                padding: 32px 22px;
            }
        }
    </style>
@endpush
