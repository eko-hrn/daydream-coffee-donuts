@extends('admin.template')

@section('title', 'Data Products | Day Dream Admin')
@section('page-title', 'Data Products')
@section('page-subtitle', 'Kelola menu produk Day Dream Donuts & Coffee.')

@section('content')

    <div class="products-page">

        <div class="page-header-card">
            <div>
                <span class="page-kicker">Product Management</span>
                <h1 class="admin-page-title">Data Products</h1>
                <p class="admin-page-subtitle">
                    Kelola menu produk, kategori, harga, gambar, dan status best seller yang tampil di website.
                </p>
            </div>

            <div class="header-actions">
                <a href="{{ route('admin.products.create') }}" class="btn btn-add-product">
                    <i class="bi bi-plus-circle-fill"></i>
                    Tambah Product
                </a>

                <a href="{{ route('admin.products.cetakPdf') }}" target="_blank" class="btn btn-print-product">
                    <i class="bi bi-file-earmark-pdf-fill"></i>
                    Cetak Semua
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-admin">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <div class="table-card-header">
                <div>
                    <h4>Product List</h4>
                    <p>Daftar seluruh produk yang tersimpan di database.</p>
                </div>
            </div>

            <div class="table-card-body">
                <div class="table-responsive">
                    <table id="tabel_product" class="table table-bordered table-striped table-hover align-middle w-100">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="110">Image</th>
                                <th>Product</th>
                                <th>Deskripsi</th>
                                <th width="130">Category</th>
                                <th width="140">Price</th>
                                <th width="130">Status</th>
                                <th width="240">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        @if ($product->image_url)
                                            <img src="{{ asset('images/' . $product->image_url) }}"
                                                alt="{{ $product->name }}" class="product-img">
                                        @else
                                            <div class="empty-img">
                                                <i class="bi bi-image"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="product-name">{{ $product->name }}</div>
                                        <div class="product-id">ID: {{ $product->id }}</div>
                                    </td>

                                    <td class="description-cell">
                                        {{ \Illuminate\Support\Str::limit($product->description, 95) }}
                                    </td>

                                    <td>
                                        <span class="badge-category">
                                            {{ $product->category }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="price-text">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    <td>
                                        @if ($product->is_best_seller)
                                            <span class="badge-status best">
                                                Best Seller
                                            </span>
                                        @else
                                            <span class="badge-status regular">
                                                Regular
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                                class="btn btn-action btn-edit">
                                                <i class="bi bi-pencil-square"></i>
                                                Edit
                                            </a>

                                            <a href="{{ route('admin.products.cetakPdfById', $product->id) }}"
                                                target="_blank" class="btn btn-action btn-pdf">
                                                <i class="bi bi-file-earmark-pdf-fill"></i>
                                                PDF
                                            </a>

                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus product ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-action btn-delete">
                                                    <i class="bi bi-trash-fill"></i>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('styles')
    <style>
        .products-page {
            padding-bottom: 30px;
        }

        .page-header-card {
            background: #ffffff;
            border: 1px solid rgba(217, 35, 46, 0.12);
            border-radius: 26px;
            padding: 28px 30px;
            margin-bottom: 24px;
            box-shadow: 0 14px 34px rgba(90, 45, 24, 0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
        }

        .page-kicker {
            display: inline-block;
            color: #d9232e;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.1px;
            margin-bottom: 8px;
        }

        .admin-page-title {
            font-size: 34px;
            line-height: 1.15;
            font-weight: 800;
            color: #5a2d18;
            margin-bottom: 6px;
        }

        .admin-page-subtitle {
            color: #7b5a46;
            margin-bottom: 0;
            line-height: 1.6;
            max-width: 720px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-add-product {
            background: #d9232e;
            border: 1px solid #d9232e;
            color: #ffffff;
            font-weight: 700;
            border-radius: 12px;
            padding: 12px 18px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            box-shadow: 0 10px 24px rgba(217, 35, 46, 0.22);
        }

        .btn-add-product:hover {
            background: #a71d24;
            border-color: #a71d24;
            color: #ffffff;
        }

        .btn-print-product {
            background: #5a2d18;
            border: 1px solid #5a2d18;
            color: #ffffff;
            font-weight: 700;
            border-radius: 12px;
            padding: 12px 18px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            box-shadow: 0 10px 24px rgba(90, 45, 24, 0.18);
        }

        .btn-print-product:hover {
            background: #3b1d10;
            border-color: #3b1d10;
            color: #ffffff;
        }

        .alert-admin {
            border: none;
            border-radius: 16px;
            font-weight: 600;
            padding: 14px 18px;
            margin-bottom: 22px;
        }

        .table-card {
            background: #ffffff;
            border: 1px solid rgba(217, 35, 46, 0.12);
            border-radius: 22px;
            box-shadow: 0 14px 34px rgba(90, 45, 24, 0.06);
            overflow: hidden;
        }

        .table-card-header {
            padding: 22px 26px;
            border-bottom: 1px solid rgba(217, 35, 46, 0.10);
            background: #ffffff;
        }

        .table-card-header h4 {
            color: #5a2d18;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .table-card-header p {
            color: #7b5a46;
            margin-bottom: 0;
            font-size: 14px;
        }

        .table-card-body {
            padding: 24px 26px;
        }

        #tabel_product {
            margin-bottom: 0 !important;
        }

        #tabel_product thead th {
            background: #f8f9fa;
            color: #5a2d18;
            font-weight: 800;
            font-size: 14px;
            vertical-align: middle;
            white-space: nowrap;
        }

        #tabel_product tbody td {
            color: #5a2d18;
            vertical-align: middle;
            font-size: 14px;
        }

        .product-img {
            width: 86px;
            height: 64px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            background: #f8f9fa;
        }

        .empty-img {
            width: 86px;
            height: 64px;
            border-radius: 10px;
            border: 1px dashed #ced4da;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #adb5bd;
            background: #f8f9fa;
        }

        .product-name {
            font-weight: 800;
            color: #5a2d18;
            margin-bottom: 3px;
        }

        .product-id {
            font-size: 12px;
            color: #9a735f;
            font-weight: 600;
        }

        .description-cell {
            line-height: 1.55;
            color: #7b5a46 !important;
            min-width: 260px;
        }

        .badge-category {
            display: inline-flex;
            align-items: center;
            background: #fff0d8;
            color: #a65a00;
            border: 1px solid #ffe0ad;
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .price-text {
            color: #d9232e;
            font-weight: 800;
            white-space: nowrap;
        }

        .badge-status {
            display: inline-flex;
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .badge-status.best {
            background: #ffe3e5;
            color: #d9232e;
        }

        .badge-status.regular {
            background: #f2f4f7;
            color: #667085;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }

        .btn-action {
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            padding: 7px 11px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-edit {
            background: #ffc107;
            border-color: #ffc107;
            color: #5a2d18;
        }

        .btn-edit:hover {
            background: #e0a800;
            border-color: #e0a800;
            color: #5a2d18;
        }

        .btn-pdf {
            background: #5a2d18;
            border-color: #5a2d18;
            color: #ffffff;
        }

        .btn-pdf:hover {
            background: #3b1d10;
            border-color: #3b1d10;
            color: #ffffff;
        }

        .btn-delete {
            background: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }

        .btn-delete:hover {
            background: #bb2d3b;
            border-color: #bb2d3b;
            color: #ffffff;
        }

        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            margin-bottom: 18px;
            color: #5a2d18;
            font-weight: 600;
        }

        .dataTables_wrapper .dataTables_filter {
            text-align: right;
        }

        .dataTables_wrapper .dataTables_filter input {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 7px 11px;
            margin-left: 8px;
            outline: none;
        }

        .dataTables_wrapper .dataTables_filter input:focus {
            border-color: #d9232e;
            box-shadow: 0 0 0 0.16rem rgba(217, 35, 46, 0.12);
        }

        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 7px 28px 7px 10px;
            margin: 0 6px;
            outline: none;
        }

        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_paginate {
            margin-top: 18px;
            color: #7b5a46;
            font-weight: 600;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: #d9232e !important;
            color: #ffffff !important;
            border-color: #d9232e !important;
            border-radius: 8px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #ffe3e5 !important;
            color: #d9232e !important;
            border-color: #ffe3e5 !important;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .page-header-card {
                flex-direction: column;
                align-items: flex-start;
                padding: 24px;
            }

            .header-actions {
                width: 100%;
            }

            .btn-add-product,
            .btn-print-product {
                width: 100%;
                justify-content: center;
            }

            .table-card-body {
                padding: 18px;
            }

            .dataTables_wrapper .dataTables_filter {
                text-align: left;
                margin-top: 12px;
            }

            .dataTables_wrapper .dataTables_filter input {
                width: 100%;
                margin-left: 0;
                margin-top: 8px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tabel_product').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [1, 7]
                }],
                language: {
                    lengthMenu: 'Tampilkan _MENU_ data per halaman',
                    search: 'Cari:',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Belum ada data',
                    zeroRecords: 'Data tidak ditemukan',
                    emptyTable: 'Belum ada data produk',
                    paginate: {
                        first: 'Pertama',
                        previous: 'Sebelumnya',
                        next: 'Berikutnya',
                        last: 'Terakhir'
                    }
                }
            });
        });
    </script>
@endpush
