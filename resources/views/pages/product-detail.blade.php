@extends('layout.app')

@section('title', $product->name . ' | Day Dream Donuts & Coffee')

@section('content')

    <section class="detail-section">
        <div class="container">

            <div class="breadcrumb-area">
                <a href="{{ route('products.index') }}">Products</a>
                <span>/</span>
                <p>{{ $product->name }}</p>
            </div>

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

            <div class="detail-card">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="detail-image-wrapper">
                            @if ($product->image_url)
                                <img src="{{ asset('images/' . $product->image_url) }}" alt="{{ $product->name }}"
                                    class="detail-image">
                            @else
                                <div class="detail-image-empty">
                                    <i class="bi bi-image"></i>
                                    <span>No Image</span>
                                </div>
                            @endif

                            @if ($product->is_best_seller)
                                <div class="detail-badge">
                                    Best Seller
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="detail-content">
                            <div class="detail-category">
                                {{ $product->category }}
                            </div>

                            <h1>{{ $product->name }}</h1>

                            <div class="detail-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </div>

                            <p class="detail-description">
                                {{ $product->description }}
                            </p>

                            <div class="detail-info">
                                <div>
                                    <span>Category</span>
                                    <strong>{{ $product->category }}</strong>
                                </div>

                                <div>
                                    <span>Status</span>
                                    <strong>
                                        {{ $product->is_best_seller ? 'Best Seller' : 'Regular Menu' }}
                                    </strong>
                                </div>

                                <div>
                                    <span>Availability</span>
                                    <strong>Available</strong>
                                </div>
                            </div>

                            <div class="detail-actions">
                                <a href="{{ route('products.index') }}" class="btn-back-menu">
                                    Back to Menu
                                </a>

                                <button type="button" class="btn-order-now" data-bs-toggle="modal"
                                    data-bs-target="#orderModal">
                                    Order Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($relatedProducts->count() > 0)
                <div class="related-section">
                    <div class="section-heading text-center">
                        <span>Related Menu</span>
                        <h2>You May Also Like</h2>
                        <p>
                            Pilihan menu lain dari kategori {{ $product->category }}.
                        </p>
                    </div>

                    <div class="row g-4 mt-4">
                        @foreach ($relatedProducts as $related)
                            <div class="col-lg-4 col-md-6">
                                <div class="related-card">
                                    @if ($related->image_url)
                                        <img src="{{ asset('images/' . $related->image_url) }}"
                                            alt="{{ $related->name }}">
                                    @else
                                        <div class="related-empty-img">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif

                                    <div class="related-body">
                                        <span>{{ $related->category }}</span>
                                        <h5>{{ $related->name }}</h5>
                                        <p>
                                            {{ \Illuminate\Support\Str::limit($related->description, 85) }}
                                        </p>

                                        <div class="related-footer">
                                            <strong>
                                                Rp {{ number_format($related->price, 0, ',', '.') }}
                                            </strong>

                                            <a href="{{ route('products.show', $related->id) }}">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </section>

    {{-- Order Modal --}}
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content order-modal">

                <div class="modal-header order-modal-header">
                    <div>
                        <span class="modal-kicker">Product Order</span>
                        <h5 class="modal-title" id="orderModalLabel">
                            Order {{ $product->name }}
                        </h5>
                        <p>
                            Isi data pesanan dengan benar supaya admin bisa memproses order kamu.
                        </p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div class="modal-body order-modal-body">

                        <div class="order-product-summary">
                            <div>
                                <strong>{{ $product->name }}</strong>
                                <span>{{ $product->category }}</span>
                            </div>

                            <div class="summary-price">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
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
        .detail-section {
            padding: 70px 0 90px;
        }

        .breadcrumb-area {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 24px;
            font-weight: 700;
        }

        .breadcrumb-area a {
            color: #d9232e;
            text-decoration: none;
        }

        .breadcrumb-area span,
        .breadcrumb-area p {
            color: #7b5a46;
            margin: 0;
        }

        .order-alert {
            border: none;
            border-radius: 16px;
            padding: 14px 18px;
            font-weight: 700;
            margin-bottom: 22px;
        }

        .detail-card {
            background: #ffffff;
            border-radius: 34px;
            padding: 34px;
            box-shadow: 0 24px 60px rgba(90, 45, 24, 0.12);
            border: 1px solid rgba(217, 35, 46, 0.08);
        }

        .detail-image-wrapper {
            position: relative;
            background: #fff7ec;
            border-radius: 30px;
            padding: 18px;
            overflow: hidden;
        }

        .detail-image {
            width: 100%;
            height: 520px;
            object-fit: cover;
            border-radius: 24px;
        }

        .detail-image-empty {
            width: 100%;
            height: 520px;
            border-radius: 24px;
            background: #ffffff;
            border: 1px dashed rgba(217, 35, 46, 0.25);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #9a735f;
            font-weight: 700;
            gap: 8px;
        }

        .detail-image-empty i {
            font-size: 42px;
            color: #d9232e;
        }

        .detail-badge {
            position: absolute;
            top: 34px;
            left: 34px;
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: #ffffff;
            padding: 10px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            box-shadow: 0 10px 24px rgba(217, 35, 46, 0.25);
        }

        .detail-category {
            display: inline-flex;
            background: #fff0d8;
            color: #a65a00;
            padding: 8px 16px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .detail-content h1 {
            color: #5a2d18;
            font-size: 46px;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1px;
            margin-bottom: 16px;
        }

        .detail-price {
            color: #d9232e;
            font-size: 30px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .detail-description {
            color: #7b5a46;
            line-height: 1.85;
            font-size: 16px;
            margin-bottom: 28px;
        }

        .detail-info {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
            margin-bottom: 30px;
        }

        .detail-info div {
            background: #fff7ec;
            border: 1px solid rgba(217, 35, 46, 0.08);
            border-radius: 20px;
            padding: 16px 18px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
        }

        .detail-info span {
            color: #9a735f;
            font-weight: 700;
        }

        .detail-info strong {
            color: #5a2d18;
            text-align: right;
        }

        .detail-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn-back-menu,
        .btn-order-now {
            text-decoration: none;
            border: none;
            border-radius: 999px;
            padding: 13px 24px;
            font-weight: 800;
            transition: 0.25s ease;
        }

        .btn-back-menu {
            background: #fff7ec;
            color: #d9232e;
            border: 1px solid rgba(217, 35, 46, 0.14);
        }

        .btn-back-menu:hover {
            background: #ffe3e5;
            color: #d9232e;
        }

        .btn-order-now {
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: white;
            box-shadow: 0 12px 26px rgba(217, 35, 46, 0.22);
        }

        .btn-order-now:hover {
            background: linear-gradient(135deg, #a71d24, #d9232e);
            color: white;
            transform: translateY(-2px);
        }

        .related-section {
            padding-top: 80px;
        }

        .section-heading span {
            color: #d9232e;
            font-size: 14px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .section-heading h2 {
            color: #5a2d18;
            font-size: 38px;
            font-weight: 800;
            margin-top: 10px;
            margin-bottom: 12px;
        }

        .section-heading p {
            color: #7b5a46;
            margin: 0 auto;
            max-width: 620px;
            line-height: 1.8;
        }

        .related-card {
            height: 100%;
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 18px 45px rgba(90, 45, 24, 0.08);
            border: 1px solid rgba(217, 35, 46, 0.08);
        }

        .related-card img {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .related-empty-img {
            width: 100%;
            height: 230px;
            background: #fff7ec;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #d9232e;
            font-size: 32px;
        }

        .related-body {
            padding: 24px;
        }

        .related-body span {
            display: inline-flex;
            background: #fff0d8;
            color: #a65a00;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .related-body h5 {
            color: #5a2d18;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .related-body p {
            color: #7b5a46;
            line-height: 1.7;
        }

        .related-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .related-footer strong {
            color: #d9232e;
            font-weight: 800;
        }

        .related-footer a {
            text-decoration: none;
            color: #d9232e;
            font-weight: 800;
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

            .detail-image,
            .detail-image-empty {
                height: 420px;
            }

            .detail-content h1 {
                font-size: 38px;
            }
        }

        @media (max-width: 576px) {
            .detail-section {
                padding: 45px 0 70px;
            }

            .detail-card {
                padding: 22px;
                border-radius: 26px;
            }

            .detail-image,
            .detail-image-empty {
                height: 320px;
            }

            .detail-content h1 {
                font-size: 32px;
            }

            .detail-info div {
                display: block;
            }

            .detail-info strong {
                display: block;
                text-align: left;
                margin-top: 4px;
            }

            .btn-back-menu,
            .btn-order-now {
                width: 100%;
                text-align: center;
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
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const orderModalElement = document.getElementById('orderModal');

                if (orderModalElement) {
                    const orderModal = new bootstrap.Modal(orderModalElement);
                    orderModal.show();
                }
            });
        </script>
    @endif
@endpush
