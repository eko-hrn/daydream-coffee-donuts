<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Product - {{ $product->name }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #3b2418;
            font-size: 13px;
            margin: 30px;
        }

        .header {
            border-bottom: 3px solid #d9232e;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #d9232e;
            margin-bottom: 4px;
        }

        .subtitle {
            color: #6f4b3a;
            font-size: 13px;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
        }

        .main-table td {
            vertical-align: top;
        }

        .image-cell {
            width: 260px;
            padding-right: 24px;
        }

        .product-image {
            width: 240px;
            height: 200px;
            object-fit: cover;
            border: 1px solid #ead7cf;
            border-radius: 10px;
        }

        .no-image {
            width: 240px;
            height: 200px;
            border: 1px dashed #c9b0a4;
            background: #fff7ec;
            color: #9a735f;
            text-align: center;
            line-height: 200px;
            font-size: 12px;
        }

        .category {
            display: inline-block;
            background: #fff0d8;
            color: #a65a00;
            padding: 7px 12px;
            border-radius: 14px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .product-title {
            font-size: 28px;
            color: #5a2d18;
            font-weight: bold;
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .price {
            font-size: 22px;
            color: #d9232e;
            font-weight: bold;
            margin-bottom: 14px;
        }

        .short-info {
            color: #7b5a46;
            line-height: 1.6;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 22px;
        }

        .info-table th {
            width: 180px;
            background: #fff7ec;
            color: #5a2d18;
            text-align: left;
            padding: 10px;
            border: 1px solid #ead7cf;
        }

        .info-table td {
            padding: 10px;
            border: 1px solid #ead7cf;
        }

        .section-title {
            color: #5a2d18;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .description-box {
            border: 1px solid #ead7cf;
            background: #fffaf3;
            padding: 16px;
            border-radius: 10px;
            line-height: 1.7;
            color: #3b2418;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 14px;
            font-size: 11px;
            font-weight: bold;
        }

        .best {
            background: #ffe3e5;
            color: #d9232e;
        }

        .regular {
            background: #f2f2f2;
            color: #555555;
        }

        .footer {
            margin-top: 26px;
            font-size: 10px;
            color: #7b5a46;
            text-align: right;
            border-top: 1px solid #ead7cf;
            padding-top: 10px;
        }
    </style>
</head>

<body>

    @php
        $imagePath = public_path('images/' . $product->image_url);
    @endphp

    <div class="header">
        <div class="brand">Day Dream Donuts & Coffee</div>
        <div class="subtitle">Product Detail Report</div>
    </div>

    <table class="main-table">
        <tr>
            <td class="image-cell">
                @if ($product->image_url && file_exists($imagePath))
                    <img src="{{ $imagePath }}" alt="{{ $product->name }}" class="product-image">
                @else
                    <div class="no-image">No Image</div>
                @endif
            </td>

            <td>
                <div class="category">
                    {{ $product->category }}
                </div>

                <div class="product-title">
                    {{ $product->name }}
                </div>

                <div class="price">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </div>

                <div class="short-info">
                    Product ID: {{ $product->id }}<br>
                    Status:
                    @if ($product->is_best_seller)
                        Best Seller
                    @else
                        Regular Menu
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <table class="info-table">
        <tr>
            <th>Product ID</th>
            <td>{{ $product->id }}</td>
        </tr>

        <tr>
            <th>Product Name</th>
            <td>{{ $product->name }}</td>
        </tr>

        <tr>
            <th>Category</th>
            <td>{{ $product->category }}</td>
        </tr>

        <tr>
            <th>Price</th>
            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>
                @if ($product->is_best_seller)
                    <span class="badge best">Best Seller</span>
                @else
                    <span class="badge regular">Regular</span>
                @endif
            </td>
        </tr>

        <tr>
            <th>Image File</th>
            <td>{{ $product->image_url ?? '-' }}</td>
        </tr>

        <tr>
            <th>Created At</th>
            <td>{{ $product->created_at ? $product->created_at->format('d M Y H:i') : '-' }}</td>
        </tr>

        <tr>
            <th>Updated At</th>
            <td>{{ $product->updated_at ? $product->updated_at->format('d M Y H:i') : '-' }}</td>
        </tr>
    </table>

    <div class="section-title">
        Description
    </div>

    <div class="description-box">
        {{ $product->description }}
    </div>

    <div class="footer">
        Dicetak pada {{ now()->format('d M Y H:i') }} | Day Dream Admin Panel - Product Management
    </div>

</body>

</html>
