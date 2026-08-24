<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Products Day Dream</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #3b2418;
            font-size: 11px;
            margin: 22px;
        }

        .header {
            border-bottom: 3px solid #d9232e;
            padding-bottom: 14px;
            margin-bottom: 18px;
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

        .meta {
            margin-top: 8px;
            font-size: 11px;
            color: #7b5a46;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #d9232e;
            color: #ffffff;
            padding: 8px;
            border: 1px solid #d9232e;
            font-size: 10px;
            text-align: left;
        }

        td {
            padding: 7px;
            border: 1px solid #ead7cf;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background: #fff7ec;
        }

        .product-img {
            width: 70px;
            height: 55px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #ead7cf;
        }

        .no-image {
            width: 70px;
            height: 55px;
            border: 1px dashed #c9b0a4;
            color: #9a735f;
            font-size: 9px;
            text-align: center;
            line-height: 55px;
        }

        .product-name {
            font-weight: bold;
            color: #5a2d18;
        }

        .product-id {
            color: #7b5a46;
            font-size: 9px;
            margin-top: 3px;
        }

        .price {
            color: #d9232e;
            font-weight: bold;
            white-space: nowrap;
        }

        .badge {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: bold;
            white-space: nowrap;
        }

        .best {
            background: #ffe3e5;
            color: #d9232e;
        }

        .regular {
            background: #f2f2f2;
            color: #555555;
        }

        .description {
            line-height: 1.45;
        }

        .footer {
            margin-top: 18px;
            font-size: 10px;
            color: #7b5a46;
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="brand">Day Dream Donuts & Coffee</div>
        <div class="subtitle">Data Products Report</div>
        <div class="meta">
            Dicetak pada: {{ now()->format('d M Y H:i') }} | Total Produk: {{ $products->count() }}
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="32">No</th>
                <th width="85">Image</th>
                <th width="130">Product</th>
                <th width="85">Category</th>
                <th width="85">Price</th>
                <th width="85">Status</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                @php
                    $imagePath = public_path('images/' . $product->image_url);
                @endphp

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if ($product->image_url && file_exists($imagePath))
                            <img src="{{ $imagePath }}" class="product-img" alt="{{ $product->name }}">
                        @else
                            <div class="no-image">No Image</div>
                        @endif
                    </td>

                    <td>
                        <div class="product-name">{{ $product->name }}</div>
                        <div class="product-id">ID: {{ $product->id }}</div>
                    </td>

                    <td>{{ $product->category }}</td>

                    <td class="price">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </td>

                    <td>
                        @if ($product->is_best_seller)
                            <span class="badge best">Best Seller</span>
                        @else
                            <span class="badge regular">Regular</span>
                        @endif
                    </td>

                    <td class="description">
                        {{ $product->description }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Day Dream Admin Panel - Product Management
    </div>

</body>

</html>
