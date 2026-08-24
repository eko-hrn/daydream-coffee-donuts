@extends('layout.app')

@section('title', 'Home | Day Dream Donuts & Coffee')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="hero-badge">
                        Premium Donuts & Coffee Experience
                    </div>

                    <h1 class="hero-title">
                        Enjoy Sweet Moments with
                        <span>Day Dream Donuts & Coffee</span>
                    </h1>

                    <p class="hero-description">
                        Menghadirkan perpaduan sempurna antara donut premium, kopi berkualitas,
                        dan suasana hangat untuk menemani setiap momen spesial Anda.
                    </p>

                    <div class="hero-actions">
                        <a href="{{ url('/products') }}" class="btn btn-jco btn-lg">
                            Explore Our Menu
                        </a>

                        <a href="{{ url('/about') }}" class="btn btn-outline-jco btn-lg">
                            About Day Dream
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div>
                            <h4>2025</h4>
                            <p>Established</p>
                        </div>

                        <div>
                            <h4>Fresh</h4>
                            <p>Daily Made</p>
                        </div>

                        <div>
                            <h4>Premium</h4>
                            <p>Ingredients</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?ixlib=rb-4.0.3&auto=format&fit=crop&w=900&q=80"
                            class="hero-image" alt="Day Dream Donuts">

                        <div class="floating-card floating-card-top">
                            <strong>Freshly Made</strong>
                            <span>Donuts prepared daily</span>
                        </div>

                        <div class="floating-card floating-card-bottom">
                            <strong>Perfect Pair</strong>
                            <span>Donuts & Coffee</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- BRAND HIGHLIGHT --}}
    <section class="section-padding">
        <div class="container">
            <div class="section-heading text-center">
                <span>Why Choose Us</span>
                <h2>More Than Just Donuts</h2>
                <p>
                    Day Dream menghadirkan pengalaman menikmati donut dan kopi dengan kualitas,
                    rasa, serta pelayanan yang konsisten.
                </p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>Premium Quality</h5>
                        <p>
                            Dibuat menggunakan bahan pilihan untuk menghasilkan rasa yang lembut,
                            fresh, dan berkualitas.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>Signature Taste</h5>
                        <p>
                            Memiliki varian donut khas dengan topping menarik yang cocok untuk
                            berbagai selera pelanggan.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card">
                        <h5>Warm Experience</h5>
                        <p>
                            Memberikan suasana yang nyaman untuk bersantai, bekerja, berkumpul,
                            atau menikmati waktu bersama.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCT PREVIEW --}}
    <section class="section-padding product-section">
        <div class="container">
            <div class="section-heading text-center">
                <span>Our Favorites</span>
                <h2>Signature Menu</h2>
                <p>
                    Pilihan menu favorit yang menjadi bagian dari pengalaman khas Day Dream
                </p>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1527904324834-3bda86da6771?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Donuts">

                        <div class="product-content">
                            <span>Best Seller</span>
                            <h5>Signature Donuts</h5>
                            <p>
                                Donut lembut dengan berbagai pilihan topping manis yang cocok
                                untuk dinikmati kapan saja.
                            </p>
                            <a href="{{ url('/products') }}">View Menu</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Coffee">

                        <div class="product-content">
                            <span>Coffee Selection</span>
                            <h5>Premium Coffee</h5>
                            <p>
                                Racikan kopi berkualitas yang menjadi pasangan sempurna untuk
                                setiap pilihan donut favorit Anda.
                            </p>
                            <a href="{{ url('/products') }}">View Menu</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <img src="https://images.unsplash.com/photo-1550617931-e17a7b70dce2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Dessert">

                        <div class="product-content">
                            <span>Sweet Treats</span>
                            <h5>Dessert & Beverages</h5>
                            <p>
                                Pilihan makanan ringan dan minuman yang cocok untuk menemani
                                aktivitas harian Anda.
                            </p>
                            <a href="{{ url('/products') }}">View Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ABOUT PREVIEW --}}
    <section class="section-padding">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="about-image-grid">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Donuts Display">

                        <div class="about-small-card">
                            <h4>Since 2025</h4>
                            <p>Serving sweet moments with passion.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <span>About Day Dream</span>
                        <h2>Creating Sweet Memories Through Every Bite</h2>

                        <p>
                            Day Dream Donuts & Coffee hadir sebagai brand yang mengutamakan kualitas,
                            inovasi rasa, dan pengalaman pelanggan. Setiap produk dibuat dengan
                            perhatian terhadap rasa, tampilan, serta kenyamanan saat dinikmati.
                        </p>

                        <p>
                            Dengan konsep modern dan hangat, Day Dream menjadi pilihan untuk menikmati
                            donut, kopi, dan momen kebersamaan bersama keluarga, teman, maupun rekan kerja.
                        </p>

                        <a href="{{ url('/about') }}" class="btn btn-jco">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA SECTION --}}
    <section class="cta-section">
        <div class="container">
            <div class="cta-card">
                <div>
                    <span>Ready to Taste?</span>
                    <h2>Discover Your Favorite Day Dream Menu Today</h2>
                    <p>
                        Temukan pilihan donut dan coffee favorit Anda, lalu nikmati pengalaman
                        manis bersama Day Dream
                    </p>
                </div>

                <a href="{{ url('/products') }}" class="btn btn-light btn-lg">
                    Order Now
                </a>
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        .hero-section {
            padding: 90px 0 70px;
            position: relative;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            background: #ffe3e5;
            color: #d9232e;
            padding: 10px 18px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .hero-title {
            font-size: 56px;
            line-height: 1.08;
            font-weight: 800;
            color: #5a2d18;
            letter-spacing: -1.8px;
            margin-bottom: 22px;
        }

        .hero-title span {
            color: #d9232e;
        }

        .hero-description {
            font-size: 18px;
            line-height: 1.8;
            color: #7b5a46;
            max-width: 560px;
            margin-bottom: 32px;
        }

        .hero-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-bottom: 38px;
        }

        .btn-outline-jco {
            border: 2px solid #d9232e;
            color: #d9232e;
            border-radius: 999px;
            padding: 10px 22px;
            font-weight: 700;
            background: transparent;
        }

        .btn-outline-jco:hover {
            background: #d9232e;
            color: white;
        }

        .hero-stats {
            display: flex;
            gap: 24px;
            flex-wrap: wrap;
        }

        .hero-stats div {
            background: white;
            border-radius: 20px;
            padding: 18px 22px;
            min-width: 130px;
            box-shadow: 0 12px 30px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
        }

        .hero-stats h4 {
            font-size: 24px;
            font-weight: 800;
            color: #d9232e;
            margin-bottom: 4px;
        }

        .hero-stats p {
            font-size: 13px;
            color: #8a5a44;
            margin: 0;
            font-weight: 600;
        }

        .hero-image-wrapper {
            position: relative;
            padding: 18px;
            background: white;
            border-radius: 38px;
            box-shadow: 0 24px 60px rgba(90, 45, 24, 0.14);
        }

        .hero-image {
            width: 100%;
            height: 540px;
            object-fit: cover;
            border-radius: 30px;
        }

        .floating-card {
            position: absolute;
            background: white;
            border-radius: 18px;
            padding: 14px 18px;
            box-shadow: 0 14px 35px rgba(90, 45, 24, 0.16);
            border: 1px solid rgba(217, 35, 46, 0.08);
            display: flex;
            flex-direction: column;
        }

        .floating-card strong {
            color: #d9232e;
            font-size: 15px;
        }

        .floating-card span {
            color: #7b5a46;
            font-size: 12px;
        }

        .floating-card-top {
            top: 52px;
            left: -18px;
        }

        .floating-card-bottom {
            bottom: 52px;
            right: -18px;
        }

        .section-padding {
            padding: 80px 0;
        }

        .section-heading span,
        .about-content span,
        .cta-card span {
            color: #d9232e;
            font-weight: 800;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .section-heading h2,
        .about-content h2,
        .cta-card h2 {
            color: #5a2d18;
            font-size: 40px;
            font-weight: 800;
            margin-top: 10px;
            margin-bottom: 14px;
            letter-spacing: -0.8px;
        }

        .section-heading p {
            max-width: 680px;
            margin: 0 auto;
            color: #7b5a46;
            line-height: 1.8;
        }

        .feature-card {
            height: 100%;
            background: white;
            padding: 34px;
            border-radius: 28px;
            box-shadow: 0 16px 40px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
            transition: 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 22px 55px rgba(217, 35, 46, 0.12);
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: #ffe3e5;
            color: #d9232e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .feature-card h5 {
            color: #5a2d18;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: #7b5a46;
            line-height: 1.7;
            margin: 0;
        }

        .product-section {
            background: rgba(255, 255, 255, 0.45);
        }

        .product-card {
            height: 100%;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(90, 45, 24, 0.09);
            border: 1px solid rgba(217, 35, 46, 0.08);
            transition: 0.25s ease;
        }

        .product-card:hover {
            transform: translateY(-8px);
        }

        .product-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .product-content {
            padding: 28px;
        }

        .product-content span {
            display: inline-block;
            background: #fff0d8;
            color: #a65a00;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 14px;
        }

        .product-content h5 {
            color: #5a2d18;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .product-content p {
            color: #7b5a46;
            line-height: 1.7;
        }

        .product-content a {
            color: #d9232e;
            text-decoration: none;
            font-weight: 800;
        }

        .product-content a:hover {
            text-decoration: underline;
        }

        .about-image-grid {
            position: relative;
            border-radius: 34px;
            overflow: hidden;
            box-shadow: 0 24px 55px rgba(90, 45, 24, 0.14);
        }

        .about-image-grid img {
            width: 100%;
            height: 470px;
            object-fit: cover;
        }

        .about-small-card {
            position: absolute;
            left: 28px;
            bottom: 28px;
            background: rgba(255, 255, 255, 0.94);
            border-radius: 24px;
            padding: 22px;
            max-width: 260px;
            box-shadow: 0 14px 35px rgba(90, 45, 24, 0.15);
        }

        .about-small-card h4 {
            color: #d9232e;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .about-small-card p {
            color: #7b5a46;
            margin: 0;
        }

        .about-content p {
            color: #7b5a46;
            line-height: 1.9;
            margin-bottom: 18px;
        }

        .cta-section {
            padding: 50px 0 90px;
        }

        .cta-card {
            background: linear-gradient(135deg, #d9232e, #a71d24);
            color: white;
            padding: 48px;
            border-radius: 34px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 28px;
            box-shadow: 0 24px 60px rgba(217, 35, 46, 0.22);
        }

        .cta-card span {
            color: #ffe0ad;
        }

        .cta-card h2 {
            color: white;
            max-width: 700px;
        }

        .cta-card p {
            color: rgba(255, 255, 255, 0.88);
            max-width: 640px;
            line-height: 1.8;
            margin: 0;
        }

        .cta-card .btn {
            border-radius: 999px;
            color: #d9232e;
            font-weight: 800;
            padding: 12px 28px;
            white-space: nowrap;
        }

        @media (max-width: 991px) {
            .hero-section {
                padding: 60px 0 40px;
            }

            .hero-title {
                font-size: 42px;
            }

            .hero-image {
                height: 420px;
            }

            .floating-card {
                display: none;
            }

            .cta-card {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .hero-title {
                font-size: 34px;
            }

            .hero-description {
                font-size: 16px;
            }

            .hero-actions .btn {
                width: 100%;
            }

            .hero-stats div {
                width: 100%;
            }

            .section-heading h2,
            .about-content h2,
            .cta-card h2 {
                font-size: 30px;
            }

            .hero-image {
                height: 330px;
            }

            .section-padding {
                padding: 55px 0;
            }

            .cta-card {
                padding: 32px 22px;
            }
        }
    </style>
@endpush
