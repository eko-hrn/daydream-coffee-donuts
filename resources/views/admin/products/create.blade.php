@extends('admin.template')

@section('title', 'Create Product | Day Dream Admin')
@section('page-title', 'Create Product')
@section('page-subtitle', 'Tambahkan menu produk baru ke website.')

@section('content')

    <div class="content-card">
        <div class="form-header">
            <div>
                <span>Products Management</span>
                <h4>Add New Product</h4>
            </div>

            <a href="{{ route('admin.products.index') }}" class="btn-back">
                <i class="bi bi-arrow-left"></i>
                Back
            </a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
            class="product-form mt-4">
            @csrf

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="form-section">
                        <h5>Product Information</h5>

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Example: Alcapone Donut">

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Category</label>
                                <select name="category" class="form-select @error('category') is-invalid @enderror">
                                    <option value="">Choose Category</option>

                                    @foreach ($categories as $category)
                                        <option value="{{ $category }}"
                                            {{ old('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}"
                                    placeholder="Example: 12000">

                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="5" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Write product description here...">{{ old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mt-3">
                            <input type="checkbox" name="is_best_seller" value="1" class="form-check-input"
                                id="isBestSeller" {{ old('is_best_seller') ? 'checked' : '' }}>

                            <label class="form-check-label" for="isBestSeller">
                                Mark as Best Seller
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="form-section">
                        <h5>Product Image</h5>

                        <div class="image-upload-box">
                            <i class="bi bi-image"></i>
                            <p>Upload product image from your device.</p>
                        </div>

                        <input type="file" name="image_url"
                            class="form-control mt-3 @error('image_url') is-invalid @enderror" accept="image/*">

                        @error('image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <small class="helper-text">
                            Format: JPG, JPEG, PNG, WEBP. Max 2MB.
                        </small>
                    </div>
                </div>
            </div>

            <div class="form-action mt-4">
                <button type="submit" class="btn-submit">
                    <i class="bi bi-save-fill"></i>
                    Save Product
                </button>
            </div>
        </form>
    </div>

@endsection

@push('styles')
    <style>
        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .form-header span {
            color: #d9232e;
            font-size: 13px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.1px;
        }

        .form-header h4 {
            color: #5a2d18;
            font-size: 30px;
            font-weight: 800;
            margin: 6px 0 0;
        }

        .btn-back {
            text-decoration: none;
            background: #fff7ec;
            color: #d9232e;
            border: 1px solid rgba(217, 35, 46, 0.14);
            border-radius: 999px;
            padding: 11px 18px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            background: #ffe3e5;
            color: #d9232e;
        }

        .form-section {
            background: #fffaf3;
            border: 1px solid rgba(217, 35, 46, 0.1);
            border-radius: 26px;
            padding: 26px;
            height: 100%;
        }

        .form-section h5 {
            color: #5a2d18;
            font-size: 20px;
            font-weight: 800;
            margin-bottom: 22px;
        }

        .form-label {
            color: #5a2d18;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 16px;
            border: 1px solid rgba(217, 35, 46, 0.15);
            padding: 12px 14px;
            color: #5a2d18;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #d9232e;
            box-shadow: 0 0 0 0.18rem rgba(217, 35, 46, 0.12);
        }

        .form-check-input:checked {
            background-color: #d9232e;
            border-color: #d9232e;
        }

        .form-check-label {
            color: #7b5a46;
            font-weight: 700;
        }

        .image-upload-box {
            border: 2px dashed rgba(217, 35, 46, 0.25);
            border-radius: 24px;
            padding: 38px 22px;
            text-align: center;
            background: white;
        }

        .image-upload-box i {
            color: #d9232e;
            font-size: 42px;
            margin-bottom: 12px;
            display: inline-block;
        }

        .image-upload-box p {
            color: #7b5a46;
            margin: 0;
            font-weight: 600;
        }

        .helper-text {
            display: block;
            color: #9a735f;
            margin-top: 10px;
            line-height: 1.6;
        }

        .form-action {
            display: flex;
            justify-content: flex-end;
        }

        .btn-submit {
            border: none;
            background: linear-gradient(135deg, #d9232e, #ff4b55);
            color: white;
            border-radius: 999px;
            padding: 13px 22px;
            font-weight: 800;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 12px 26px rgba(217, 35, 46, 0.22);
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #a71d24, #d9232e);
        }

        @media (max-width: 576px) {

            .btn-back,
            .btn-submit {
                width: 100%;
                justify-content: center;
            }

            .form-action {
                display: block;
            }
        }
    </style>
@endpush
