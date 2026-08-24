@extends('layout.app')

@section('title', 'Products | Day Dream Donuts & Coffee')

@section('content')

    {{-- FILTER CATEGORY --}}
    <section class="products-filter-section">
        <div class="container">
            <div class="filter-card">
                <div>
                    <span>Menu Category</span>
                    <h3>Find Your Favorite Menu</h3>
                </div>

                <div class="category-filter">
                    <a href="{{ route('products.index') }}"
                        class="category-btn {{ $selectedCategory == null ? 'active' : '' }}">
                        All Menu
                    </a>

                    @foreach ($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category]) }}"
                            class="category-btn {{ $selectedCategory == $category ? 'active' : '' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- PRODUCTS LIST --}}
    <section class="products-list-section" id="product-list">
        <div class="container">

            @if (session('order_success'))
                <div class="alert alert-success order-alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('order_success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger order-alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>
                    Data order belum lengkap. Cek kembali form pesanan kamu.
                </div>
            @endif

            <div class="section-heading text-center">
                <span>Our Products</span>

                @if ($selectedCategory)
                    <h2>{{ $selectedCategory }} Menu</h2>
                    <p>
                        Menampilkan pilihan menu berdasarkan kategori {{ $selectedCategory }}.
                    </p>
                @else
                    <h2>All Signature Menu</h2>
                    <p>
                        Jelajahi seluruh pilihan menu favorit Day Dream Donuts & Coffee.
                    </p>
                @endif
            </div>

            <div class="row g-4 mt-4">
                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6">
                        <div class="product-menu-card">
                            <div class="product-image-wrapper">
                                @if ($product->image_url)
                                    <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->name }}">
                                @else
                                    <div class="product-image-empty">
                                        <span>{{ strtoupper(substr($product->name, 0, 1)) }}</span>
                                    </div>
                                @endif

                                @if ($product->is_best_seller)
                                    <div class="best-seller-badge">
                                        Best Seller
                                    </div>
                                @endif
                            </div>

                            <div class="product-body">
                                <div class="product-category">
                                    {{ $product->category }}
                                </div>

                                <h4>{{ $product->name }}</h4>

                                <p>
                                    {{ \Illuminate\Support\Str::limit($product->description, 115) }}
                                </p>

                                <div class="product-price">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>

                                <div class="product-actions">
                                    <a href="{{ route('products.show', $product->id) }}" class="product-detail-btn">
                                        Lihat Detail
                                    </a>

                                    <button type="button" class="product-order-btn" data-bs-toggle="modal"
                                        data-bs-target="#productOrderModal" data-product-id="{{ $product->id }}"
                                        data-product-name="{{ $product->name }}"
                                        data-product-category="{{ $product->category }}"
                                        data-product-price="{{ $product->price }}"
                                        data-product-price-format="Rp {{ number_format($product->price, 0, ',', '.') }}">
                                        Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-product">
                            <h4>Menu belum tersedia</h4>
                            <p>
                                Saat ini belum ada produk pada kategori yang dipilih.
                            </p>

                            <a href="{{ route('products.index') }}" class="btn btn-jco">
                                Back to All Menu
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            @if ($products->hasPages())
                <div class="pagination-area">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="products-cta-section">
        <div class="container">
            <div class="products-cta-card">
                <div>
                    <span>Enjoy Your Sweet Moment</span>
                    <h2>Perfect Menu for Every Occasion</h2>
                    <p>
                        Dari donut manis, coffee hangat, hingga minuman segar, Day Dream hadir
                        untuk menemani waktu santai dan momen spesial Anda.
                    </p>
                </div>

                <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">
                    View All Menu
                </a>
            </div>
        </div>
    </section>

    {{-- ORDER MODAL --}}
    <div class="modal fade" id="productOrderModal" tabindex="-1" aria-labelledby="productOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content order-modal">

                <div class="modal-header order-modal-header">
                    <div>
                        <span class="modal-kicker">Product Order</span>
                        <h5 class="modal-title" id="productOrderModalLabel">
                            Order Product
                        </h5>
                        <p>
                            Isi data pesanan. Order akan langsung masuk ke halaman admin.
                        </p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" id="modal_product_id" value="{{ old('product_id') }}">

                    <div class="modal-body order-modal-body">

                        <div class="order-product-summary">
                            <div>
                                <strong id="modal_product_name">Product Name</strong>
                                <span id="modal_product_category">Category</span>
                            </div>

                            <div class="summary-price" id="modal_product_price">
                                Rp 0
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="customer_name"
                                class="form-control order-input @error('customer_name') is-invalid @enderror"
                                value="{{ old('customer_name') }}" placeholder="Masukkan nama kamu">

                            @error('customer_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" name="customer_phone"
                                class="form-control order-input @error('customer_phone') is-invalid @enderror"
                                value="{{ old('customer_phone') }}" placeholder="Contoh: 08123456789">

                            @error('customer_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="customer_email"
                                class="form-control order-input @error('customer_email') is-invalid @enderror"
                                value="{{ old('customer_email') }}" placeholder="Opsional">

                            @error('customer_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="quantity"
                                class="form-control order-input @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity', 1) }}" min="1">

                            @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Catatan</label>
                            <textarea name="note" rows="3" class="form-control order-input @error('note') is-invalid @enderror"
                                placeholder="Contoh: ambil jam 3 sore, tanpa topping tertentu, dll">{{ old('note') }}</textarea>

                            @error('note')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer order-modal-footer">
                        <button type="button" class="btn-cancel-order" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn-submit-order">
                            <i class="bi bi-send-fill"></i>
                            Kirim Order
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .products-hero-section {
            padding: 70px 0 35px;
        }

        .products-hero-card {
            background: linear-gradient(135deg, #ffffff, #fff7ec);
            border: 1px solid rgba(217, 35, 46, 0.1);
            border-radius: 36px;
            padding: 48px;
            box-shadow: 0 24px 60px rgba(90, 45, 24, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            position: relative;
            overflow: hidden;
        }

        .products-hero-card::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: #ffe3e5;
            right: -80px;
            top: -80px;
            opacity: 0.8;
        }

        .products-hero-card>* {
            position: relative;
            z-index: 2;
        }

        .products-hero-card span,
        .filter-card span,
        .section-heading span,
        .products-cta-card span {
            color: #d9232e;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .products-hero-card h1 {
            color: #5a2d18;
            font-size: 48px;
            font-weight: 800;
            letter-spacing: -1.2px;
            margin: 12px 0 14px;
        }

        .products-hero-card p {
            color: #7b5a46;
            line-height: 1.8;
            max-width: 700px;
            margin: 0;
        }

        .hero-menu-btn {
            text-decoration: none;
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: white;
            padding: 13px 26px;
            border-radius: 999px;
            font-weight: 800;
            white-space: nowrap;
            box-shadow: 0 14px 30px rgba(217, 35, 46, 0.25);
        }

        .hero-menu-btn:hover {
            color: white;
            background: linear-gradient(135deg, #a71d24, #d9232e);
        }

        .products-filter-section {
            padding: 30px 0 45px;
        }

        .filter-card {
            background: white;
            border-radius: 30px;
            padding: 28px 30px;
            box-shadow: 0 18px 45px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
            flex-wrap: wrap;
        }

        .filter-card h3 {
            color: #5a2d18;
            font-size: 28px;
            font-weight: 800;
            margin: 6px 0 0;
        }

        .category-filter {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .category-btn {
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 999px;
            color: #5a2d18;
            background: #fff7ec;
            font-weight: 800;
            border: 1px solid rgba(217, 35, 46, 0.12);
            transition: 0.25s ease;
        }

        .category-btn:hover,
        .category-btn.active {
            background: #d9232e;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(217, 35, 46, 0.22);
        }

        .products-list-section {
            padding: 45px 0 80px;
        }

        .order-alert {
            border: none;
            border-radius: 16px;
            padding: 14px 18px;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .section-heading h2 {
            color: #5a2d18;
            font-size: 42px;
            font-weight: 800;
            margin-top: 10px;
            margin-bottom: 14px;
            letter-spacing: -0.8px;
        }

        .section-heading p {
            color: #7b5a46;
            line-height: 1.8;
            max-width: 680px;
            margin: 0 auto;
        }

        .product-menu-card {
            height: 100%;
            background: white;
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(90, 45, 24, 0.09);
            border: 1px solid rgba(217, 35, 46, 0.08);
            transition: 0.25s ease;
            display: flex;
            flex-direction: column;
        }

        .product-menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 60px rgba(217, 35, 46, 0.12);
        }

        .product-image-wrapper {
            position: relative;
            overflow: hidden;
            background: #fff7ec;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 265px;
            object-fit: cover;
            transition: 0.35s ease;
        }

        .product-menu-card:hover .product-image-wrapper img {
            transform: scale(1.06);
        }

        .product-image-empty {
            width: 100%;
            height: 265px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff7ec;
        }

        .product-image-empty span {
            width: 74px;
            height: 74px;
            border-radius: 50%;
            background: #ffe3e5;
            color: #d9232e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: 800;
        }

        .best-seller-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: white;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            box-shadow: 0 10px 24px rgba(217, 35, 46, 0.25);
        }

        .product-body {
            padding: 28px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .product-category {
            width: fit-content;
            display: inline-flex;
            background: #fff0d8;
            color: #a65a00;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .product-body h4 {
            color: #5a2d18;
            font-size: 23px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .product-body p {
            color: #7b5a46;
            line-height: 1.75;
            margin-bottom: 22px;
            flex: 1;
        }

        .product-price {
            color: #d9232e;
            font-size: 21px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .product-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .product-detail-btn,
        .product-order-btn {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 999px;
            font-weight: 800;
            transition: 0.25s ease;
            text-align: center;
            cursor: pointer;
        }

        .product-detail-btn {
            background: #fff7ec;
            color: #5a2d18;
            border: 1px solid rgba(217, 35, 46, 0.14);
        }

        .product-detail-btn:hover {
            background: #ffe3e5;
            color: #d9232e;
        }

        .product-order-btn {
            background: #d9232e;
            color: white;
            border: 1px solid #d9232e;
        }

        .product-order-btn:hover {
            background: #a71d24;
            color: white;
            border-color: #a71d24;
        }

        .empty-product {
            background: white;
            border-radius: 28px;
            text-align: center;
            padding: 50px 28px;
            box-shadow: 0 18px 45px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
        }

        .empty-product h4 {
            color: #5a2d18;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .empty-product p {
            color: #7b5a46;
            margin-bottom: 24px;
        }

        .pagination-area {
            margin-top: 42px;
            display: flex;
            justify-content: center;
        }

        .pagination {
            gap: 6px;
            flex-wrap: wrap;
        }

        .pagination .page-link {
            border: none;
            background: #fff7ec;
            color: #5a2d18;
            font-weight: 800;
            border-radius: 999px;
            padding: 10px 15px;
            box-shadow: 0 8px 18px rgba(90, 45, 24, 0.06);
        }

        .pagination .page-link:hover {
            background: #ffe3e5;
            color: #d9232e;
        }

        .pagination .page-item.active .page-link {
            background: #d9232e;
            color: #ffffff;
            box-shadow: 0 10px 24px rgba(217, 35, 46, 0.22);
        }

        .pagination .page-item.disabled .page-link {
            background: #f5f0ea;
            color: #b79b8b;
        }

        .products-cta-section {
            padding: 35px 0 90px;
        }

        .products-cta-card {
            background: linear-gradient(135deg, #d9232e, #a71d24);
            color: white;
            border-radius: 36px;
            padding: 48px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 28px;
            box-shadow: 0 24px 60px rgba(217, 35, 46, 0.22);
        }

        .products-cta-card span {
            color: #ffe0ad;
        }

        .products-cta-card h2 {
            color: white;
            font-size: 38px;
            font-weight: 800;
            margin-top: 10px;
            margin-bottom: 12px;
            max-width: 640px;
        }

        .products-cta-card p {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.8;
            max-width: 650px;
            margin: 0;
        }

        .products-cta-card .btn {
            color: #d9232e;
            border-radius: 999px;
            font-weight: 800;
            padding: 12px 28px;
            white-space: nowrap;
        }

        .order-modal {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 24px 70px rgba(90, 45, 24, 0.18);
        }

        .order-modal-header {
            background: #fff7ec;
            border-bottom: 1px solid rgba(217, 35, 46, 0.10);
            padding: 22px 24px;
        }

        .modal-kicker {
            display: inline-flex;
            color: #d9232e;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .order-modal-header .modal-title {
            color: #5a2d18;
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 4px;
        }

        .order-modal-header p {
            color: #7b5a46;
            font-size: 13px;
            margin-bottom: 0;
            line-height: 1.6;
        }

        .order-modal-body {
            padding: 24px;
        }

        .order-product-summary {
            background: #fff7ec;
            border: 1px solid rgba(217, 35, 46, 0.10);
            border-radius: 18px;
            padding: 15px 17px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: center;
        }

        .order-product-summary strong {
            display: block;
            color: #5a2d18;
            font-weight: 800;
            margin-bottom: 3px;
        }

        .order-product-summary span {
            color: #9a735f;
            font-size: 13px;
            font-weight: 700;
        }

        .summary-price {
            color: #d9232e;
            font-weight: 800;
            white-space: nowrap;
        }

        .order-modal-body .form-label {
            color: #5a2d18;
            font-weight: 700;
            font-size: 14px;
            margin-bottom: 7px;
        }

        .order-input {
            border-radius: 13px;
            border: 1px solid rgba(217, 35, 46, 0.16);
            color: #5a2d18;
            font-weight: 500;
            padding: 11px 13px;
        }

        .order-input:focus {
            border-color: #d9232e;
            box-shadow: 0 0 0 0.16rem rgba(217, 35, 46, 0.12);
        }

        .order-modal-footer {
            border-top: 1px solid rgba(217, 35, 46, 0.10);
            padding: 18px 24px;
            background: #ffffff;
        }

        .btn-cancel-order,
        .btn-submit-order {
            border: none;
            border-radius: 999px;
            padding: 11px 20px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: 0.25s ease;
        }

        .btn-cancel-order {
            background: #f2f4f7;
            color: #5a2d18;
        }

        .btn-cancel-order:hover {
            background: #e4e7ec;
            color: #5a2d18;
        }

        .btn-submit-order {
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: #ffffff;
            box-shadow: 0 12px 26px rgba(217, 35, 46, 0.20);
        }

        .btn-submit-order:hover {
            background: linear-gradient(135deg, #a71d24, #d9232e);
            color: #ffffff;
            transform: translateY(-1px);
        }

        @media (max-width: 991px) {
            .products-hero-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .products-hero-card h1 {
                font-size: 40px;
            }

            .products-cta-card {
                flex-direction: column;
                text-align: center;
            }

            .filter-card {
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            .products-hero-section {
                padding: 45px 0 25px;
            }

            .products-hero-card {
                padding: 30px 22px;
                border-radius: 28px;
            }

            .products-hero-card h1 {
                font-size: 32px;
            }

            .filter-card {
                padding: 24px 20px;
            }

            .category-filter {
                width: 100%;
            }

            .category-btn {
                width: 100%;
                text-align: center;
            }

            .section-heading h2,
            .products-cta-card h2 {
                font-size: 30px;
            }

            .product-actions a,
            .product-actions button {
                width: 100%;
            }

            .products-cta-card {
                padding: 32px 22px;
            }

            .order-product-summary {
                display: block;
            }

            .summary-price {
                margin-top: 8px;
            }

            .btn-cancel-order,
            .btn-submit-order {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const orderModalElement = document.getElementById('productOrderModal');


            if (!orderModalElement) {
                return;
            }

            function fillOrderModal(button) {
                const productId = button.getAttribute('data-product-id');
                const productName = button.getAttribute('data-product-name');
                const productCategory = button.getAttribute('data-product-category');
                const productPriceFormat = button.getAttribute('data-product-price-format');

                document.getElementById('modal_product_id').value = productId;
                document.getElementById('modal_product_name').innerText = productName;
                document.getElementById('modal_product_category').innerText = productCategory;
                document.getElementById('modal_product_price').innerText = productPriceFormat;
            }

            orderModalElement.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                if (button) {
                    fillOrderModal(button);
                }
            });

            const oldProductId = @json(old('product_id'));

            if (oldProductId) {
                const oldButton = document.querySelector(`.product-order-btn[data-product-id="${oldProductId}"]`);

                if (oldButton) {
                    fillOrderModal(oldButton);

                    const orderModal = new bootstrap.Modal(orderModalElement);
                    orderModal.show();
                }
            }
        });
    </script>
@endpush
