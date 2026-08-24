@extends('admin.template')

@section('title', 'Data Orders | Day Dream Admin')
@section('page-title', 'Data Orders')
@section('page-subtitle', 'Kelola pesanan customer Day Dream Donuts & Coffee.')

@section('content')

    <div class="orders-page">

        <div class="page-header-card">
            <div>
                <span class="page-kicker">Order Management</span>
                <h1 class="admin-page-title">Data Orders</h1>
                <p class="admin-page-subtitle">
                    Pantau pesanan customer dari website publik, ubah status order, dan kelola data pesanan.
                </p>
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
                    <h4>Order List</h4>
                    <p>Daftar seluruh pesanan customer yang masuk dari website publik.</p>
                </div>
            </div>

            <div class="table-card-body">
                <div class="table-responsive">
                    <table id="tabel_order" class="table table-bordered table-striped table-hover align-middle w-100">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="120">Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th width="80">Qty</th>
                                <th width="140">Total</th>
                                <th width="140">Status</th>
                                <th width="170">Tanggal</th>
                                <th width="220">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="order-code">#ORD-{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</div>
                                        <div class="order-id">ID: {{ $order->id }}</div>
                                    </td>
                                    <td>
                                        <div class="customer-name">{{ $order->customer_name }}</div>
                                        <div class="customer-contact">
                                            <i class="bi bi-telephone-fill"></i> {{ $order->customer_phone }}
                                        </div>
                                        @if ($order->customer_email)
                                            <div class="customer-contact">
                                                <i class="bi bi-envelope-fill"></i> {{ $order->customer_email }}
                                            </div>
                                        @endif
                                        @if ($order->note)
                                            <div class="order-note">
                                                Catatan: {{ $order->note }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="product-name">{{ $order->product_name }}</div>
                                        <div class="product-price">
                                            Rp {{ number_format($order->product_price, 0, ',', '.') }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="qty-badge">{{ $order->quantity }}</span>
                                    </td>
                                    <td>
                                        <span class="total-price">
                                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="status-badge status-{{ strtolower($order->status) }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="date-text">
                                            {{ $order->created_at ? $order->created_at->format('d M Y H:i') : '-' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-area">
                                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                                method="POST" class="status-form">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select status-select">
                                                    <option value="Pending"
                                                        {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending
                                                    </option>
                                                    <option value="Diproses"
                                                        {{ $order->status == 'Diproses' ? 'selected' : '' }}>Diproses
                                                    </option>
                                                    <option value="Selesai"
                                                        {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                                    </option>
                                                    <option value="Dibatalkan"
                                                        {{ $order->status == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan
                                                    </option>
                                                </select>
                                                <button type="submit" class="btn btn-action btn-update">Update</button>
                                            </form>

                                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus order ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-action btn-delete">
                                                    <i class="bi bi-trash-fill"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('styles')
    <style>
        .orders-page {
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

        #tabel_order {
            margin-bottom: 0 !important;
        }

        #tabel_order thead th {
            background: #f8f9fa;
            color: #5a2d18;
            font-weight: 800;
            font-size: 14px;
            vertical-align: middle;
            white-space: nowrap;
        }

        #tabel_order tbody td {
            color: #5a2d18;
            vertical-align: middle;
            font-size: 14px;
        }

        .order-code {
            font-weight: 800;
            color: #d9232e;
        }

        .order-id {
            font-size: 12px;
            color: #9a735f;
            font-weight: 600;
        }

        .customer-name,
        .product-name {
            font-weight: 800;
            color: #5a2d18;
            margin-bottom: 4px;
        }

        .customer-contact {
            color: #7b5a46;
            font-size: 12px;
            font-weight: 600;
            margin-top: 2px;
        }

        .customer-contact i {
            color: #d9232e;
            margin-right: 4px;
        }

        .order-note {
            margin-top: 7px;
            color: #7b5a46;
            font-size: 12px;
            line-height: 1.5;
            background: #fff7ec;
            border-radius: 10px;
            padding: 7px 9px;
        }

        .product-price {
            color: #7b5a46;
            font-size: 12px;
            font-weight: 700;
        }

        .qty-badge {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            background: #fff0d8;
            color: #a65a00;
            border: 1px solid #ffe0ad;
            border-radius: 999px;
            min-width: 38px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 800;
        }

        .total-price {
            color: #d9232e;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-badge {
            display: inline-flex;
            border-radius: 999px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff0d8;
            color: #a65a00;
        }

        .status-diproses {
            background: #e7f1ff;
            color: #0d6efd;
        }

        .status-selesai {
            background: #d1e7dd;
            color: #146c43;
        }

        .status-dibatalkan {
            background: #f8d7da;
            color: #b02a37;
        }

        .date-text {
            color: #7b5a46;
            font-weight: 600;
            font-size: 13px;
            white-space: nowrap;
        }

        .action-area {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 210px;
        }

        .status-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-select {
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            color: #5a2d18;
            border: 1px solid rgba(217, 35, 46, 0.18);
        }

        .status-select:focus {
            border-color: #d9232e;
            box-shadow: 0 0 0 0.16rem rgba(217, 35, 46, 0.12);
        }

        .btn-action {
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            padding: 7px 11px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            white-space: nowrap;
        }

        .btn-update {
            background: #5a2d18;
            border-color: #5a2d18;
            color: #ffffff;
        }

        .btn-update:hover {
            background: #3b1d10;
            border-color: #3b1d10;
            color: #ffffff;
        }

        .btn-delete {
            background: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
            width: 100%;
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
            $('#tabel_order').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50],
                autoWidth: false,
                order: [
                    [0, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [8]
                }],
                language: {
                    lengthMenu: 'Tampilkan _MENU_ data per halaman',
                    search: 'Cari:',
                    info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                    infoEmpty: 'Belum ada data',
                    zeroRecords: 'Data tidak ditemukan',
                    emptyTable: 'Belum ada data order',
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
