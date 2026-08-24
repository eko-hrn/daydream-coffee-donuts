@extends('admin.template')

@section('title', 'Data Users | Day Dream Admin')
@section('page-title', 'Data Users')
@section('page-subtitle', 'Kelola akun user admin Day Dream Donuts & Coffee.')

@section('content')

    <div class="users-page">

        <div class="page-header-card">
            <div>
                <span class="page-kicker">User Management</span>
                <h1 class="admin-page-title">Data Users</h1>
                <p class="admin-page-subtitle">
                    Kelola akun user yang dapat mengakses dashboard admin Day Dream Donuts & Coffee.
                </p>
            </div>

            <button type="button" class="btn btn-add-user" data-bs-toggle="modal" data-bs-target="#createUserModal">
                <i class="bi bi-person-plus-fill"></i>
                Tambah User
            </button>
        </div>

        <div id="alertBox"></div>

        <div class="table-card">
            <div class="table-card-header">
                <div>
                    <h4>User List</h4>
                </div>
            </div>

            <div class="table-card-body">
                <div class="table-responsive">
                    <table id="tabel_user" class="table table-bordered table-striped table-hover align-middle w-100">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th width="170">Created At</th>
                                <th width="170">Updated At</th>
                                <th width="180">Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="userTableBody">
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    Loading data users...
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- Modal Create User --}}
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-custom">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="createUserModalLabel">Tambah User</h5>
                        <p class="modal-subtitle">Buat akun user admin baru.</p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="createUserForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama User</label>
                            <input type="text" name="name" class="form-control input-custom"
                                placeholder="Masukkan nama user">
                            <div class="invalid-feedback" id="create-name-error"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control input-custom"
                                placeholder="Masukkan email user">
                            <div class="invalid-feedback" id="create-email-error"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control input-custom"
                                placeholder="Minimal 6 karakter">
                            <div class="invalid-feedback" id="create-password-error"></div>
                        </div>

                        <div>
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control input-custom"
                                placeholder="Ulangi password">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-check-circle-fill"></i>
                            Simpan User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit User --}}
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-custom">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                        <p class="modal-subtitle">Perbarui informasi akun user.</p>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="editUserForm">
                    <input type="hidden" name="id" id="edit-id">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama User</label>
                            <input type="text" name="name" id="edit-name" class="form-control input-custom">
                            <div class="invalid-feedback" id="edit-name-error"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" id="edit-email" class="form-control input-custom">
                            <div class="invalid-feedback" id="edit-email-error"></div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru</label>
                            <input type="password" name="password" id="edit-password" class="form-control input-custom"
                                placeholder="Kosongkan jika tidak ingin mengganti password">
                            <div class="invalid-feedback" id="edit-password-error"></div>
                        </div>

                        <div>
                            <label class="form-label">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" id="edit-password-confirmation"
                                class="form-control input-custom" placeholder="Ulangi password baru">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                            Batal
                        </button>

                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-save-fill"></i>
                            Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <style>
        .users-page {
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

        .btn-add-user {
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

        .btn-add-user:hover {
            background: #a71d24;
            border-color: #a71d24;
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

        #tabel_user {
            margin-bottom: 0 !important;
        }

        #tabel_user thead th {
            background: #f8f9fa;
            color: #5a2d18;
            font-weight: 800;
            font-size: 14px;
            vertical-align: middle;
            white-space: nowrap;
        }

        #tabel_user tbody td {
            color: #5a2d18;
            vertical-align: middle;
            font-size: 14px;
        }

        .user-name {
            font-weight: 800;
            color: #5a2d18;
            margin-bottom: 3px;
        }

        .user-id {
            font-size: 12px;
            color: #9a735f;
            font-weight: 600;
        }

        .user-email {
            color: #7b5a46;
            font-weight: 600;
        }

        .date-text {
            color: #7b5a46;
            font-weight: 600;
            font-size: 13px;
            white-space: nowrap;
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

        .btn-edit-user {
            background: #ffc107;
            border-color: #ffc107;
            color: #5a2d18;
        }

        .btn-edit-user:hover {
            background: #e0a800;
            border-color: #e0a800;
            color: #5a2d18;
        }

        .btn-delete-user {
            background: #dc3545;
            border-color: #dc3545;
            color: #ffffff;
        }

        .btn-delete-user:hover {
            background: #bb2d3b;
            border-color: #bb2d3b;
            color: #ffffff;
        }

        .btn-delete-user:disabled {
            background: #adb5bd;
            border-color: #adb5bd;
            cursor: not-allowed;
        }

        .modal-custom {
            border: none;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(90, 45, 24, 0.16);
        }

        .modal-header {
            padding: 22px 24px;
            border-bottom: 1px solid rgba(217, 35, 46, 0.10);
            background: #fff7ec;
        }

        .modal-title {
            color: #5a2d18;
            font-weight: 800;
            font-size: 22px;
            margin-bottom: 4px;
        }

        .modal-subtitle {
            color: #7b5a46;
            font-size: 13px;
            margin-bottom: 0;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 18px 24px;
            border-top: 1px solid rgba(217, 35, 46, 0.10);
            background: #ffffff;
        }

        .form-label {
            color: #5a2d18;
            font-weight: 700;
            font-size: 14px;
        }

        .input-custom {
            height: 46px;
            border-radius: 12px;
            border: 1px solid rgba(217, 35, 46, 0.18);
            color: #5a2d18;
            font-weight: 500;
        }

        .input-custom:focus {
            border-color: #d9232e;
            box-shadow: 0 0 0 0.16rem rgba(217, 35, 46, 0.12);
        }

        .btn-cancel {
            border-radius: 10px;
            background: #f2f4f7;
            color: #5a2d18;
            font-weight: 700;
            padding: 10px 16px;
        }

        .btn-cancel:hover {
            background: #e4e7ec;
            color: #5a2d18;
        }

        .btn-save {
            border-radius: 10px;
            background: #d9232e;
            border: 1px solid #d9232e;
            color: #ffffff;
            font-weight: 700;
            padding: 10px 16px;
            display: inline-flex;
            align-items: center;
            gap: 7px;
        }

        .btn-save:hover {
            background: #a71d24;
            border-color: #a71d24;
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

            .btn-add-user {
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
        const apiUrl = @json(url('/api/users'));
        const apiToken = @json(auth()->user()->createToken('jco-web-user-token')->plainTextToken);
        const currentUserId = @json(auth()->id());

        let createModal;
        let editModal;
        let userDataTable = null;

        document.addEventListener('DOMContentLoaded', function() {
            createModal = new bootstrap.Modal(document.getElementById('createUserModal'));
            editModal = new bootstrap.Modal(document.getElementById('editUserModal'));

            loadUsers();

            document.getElementById('createUserForm').addEventListener('submit', createUser);
            document.getElementById('editUserForm').addEventListener('submit', updateUser);
        });

        function apiHeaders(extraHeaders = {}) {
            return {
                'Accept': 'application/json',
                'Authorization': `Bearer ${apiToken}`,
                ...extraHeaders
            };
        }

        async function loadUsers() {
            const tbody = document.getElementById('userTableBody');

            if (userDataTable) {
                userDataTable.destroy();
                userDataTable = null;
            }

            tbody.innerHTML = `
                <tr>
                    <td colspan="6" class="text-center py-4">
                        Loading data users...
                    </td>
                </tr>
            `;

            try {
                const response = await fetch(apiUrl, {
                    method: 'GET',
                    headers: apiHeaders()
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(result.message || 'Gagal mengambil data users.');
                }

                const users = result.data || [];

                if (users.length === 0) {
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Belum ada data user.
                            </td>
                        </tr>
                    `;
                    return;
                }

                tbody.innerHTML = '';

                users.forEach((user, index) => {
                    const deleteButton = Number(user.id) === Number(currentUserId) ?
                        `<button type="button" class="btn btn-action btn-delete-user" disabled title="User sedang login tidak bisa dihapus">
                                <i class="bi bi-lock-fill"></i>
                                Aktif
                           </button>` :
                        `<button type="button" class="btn btn-action btn-delete-user" onclick="deleteUser(${user.id})">
                                <i class="bi bi-trash-fill"></i>
                                Hapus
                           </button>`;

                    tbody.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>
                                <div class="user-name">${escapeHtml(user.name)}</div>
                                <div class="user-id">ID: ${user.id}</div>
                            </td>
                            <td>
                                <span class="user-email">${escapeHtml(user.email)}</span>
                            </td>
                            <td>
                                <span class="date-text">${formatDate(user.created_at)}</span>
                            </td>
                            <td>
                                <span class="date-text">${formatDate(user.updated_at)}</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button type="button" class="btn btn-action btn-edit-user"
                                        onclick="openEditModal(${user.id})">
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </button>

                                    ${deleteButton}
                                </div>
                            </td>
                        </tr>
                    `;
                });

                initDataTable();

            } catch (error) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center text-danger py-4">
                            Gagal mengambil data dari API. Pastikan token Sanctum dan route API sudah benar.
                        </td>
                    </tr>
                `;
            }
        }

        function initDataTable() {
            if (window.jQuery && $.fn.DataTable) {
                userDataTable = $('#tabel_user').DataTable({
                    pageLength: 10,
                    lengthMenu: [5, 10, 25, 50],
                    autoWidth: false,
                    order: [
                        [0, 'asc']
                    ],
                    columnDefs: [{
                        orderable: false,
                        targets: [5]
                    }],
                    language: {
                        lengthMenu: 'Tampilkan _MENU_ data per halaman',
                        search: 'Cari:',
                        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                        infoEmpty: 'Belum ada data',
                        zeroRecords: 'Data tidak ditemukan',
                        emptyTable: 'Belum ada data user',
                        paginate: {
                            first: 'Pertama',
                            previous: 'Sebelumnya',
                            next: 'Berikutnya',
                            last: 'Terakhir'
                        }
                    }
                });
            }
        }

        async function createUser(e) {
            e.preventDefault();
            clearCreateErrors();

            const form = e.target;
            const formData = new FormData(form);

            const payload = {
                name: formData.get('name'),
                email: formData.get('email'),
                password: formData.get('password'),
                password_confirmation: formData.get('password_confirmation'),
            };

            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: apiHeaders({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify(payload)
                });

                const result = await response.json();

                if (!response.ok) {
                    showCreateErrors(result.errors || {});
                    showAlert('danger', result.message || 'Gagal menambahkan user.');
                    return;
                }

                form.reset();
                createModal.hide();
                showAlert('success', result.message || 'User berhasil ditambahkan.');
                loadUsers();

            } catch (error) {
                showAlert('danger', 'Gagal menambahkan user.');
            }
        }

        async function openEditModal(id) {
            clearEditErrors();

            try {
                const response = await fetch(`${apiUrl}/${id}`, {
                    method: 'GET',
                    headers: apiHeaders()
                });

                const result = await response.json();

                if (!response.ok) {
                    showAlert('danger', result.message || 'User tidak ditemukan.');
                    return;
                }

                const user = result.data;

                document.getElementById('edit-id').value = user.id;
                document.getElementById('edit-name').value = user.name;
                document.getElementById('edit-email').value = user.email;
                document.getElementById('edit-password').value = '';
                document.getElementById('edit-password-confirmation').value = '';

                editModal.show();

            } catch (error) {
                showAlert('danger', 'Gagal mengambil detail user.');
            }
        }

        async function updateUser(e) {
            e.preventDefault();
            clearEditErrors();

            const formData = new FormData(e.target);
            const id = document.getElementById('edit-id').value;

            const payload = {
                name: formData.get('name'),
                email: formData.get('email'),
                password: formData.get('password'),
                password_confirmation: formData.get('password_confirmation'),
            };

            try {
                const response = await fetch(`${apiUrl}/${id}`, {
                    method: 'PUT',
                    headers: apiHeaders({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify(payload)
                });

                const result = await response.json();

                if (!response.ok) {
                    showEditErrors(result.errors || {});
                    showAlert('danger', result.message || 'Gagal memperbarui user.');
                    return;
                }

                editModal.hide();
                showAlert('success', result.message || 'User berhasil diperbarui.');
                loadUsers();

            } catch (error) {
                showAlert('danger', 'Gagal memperbarui user.');
            }
        }

        async function deleteUser(id) {
            if (Number(id) === Number(currentUserId)) {
                showAlert('danger', 'User yang sedang login tidak bisa dihapus.');
                return;
            }

            if (!confirm('Yakin ingin menghapus user ini?')) {
                return;
            }

            try {
                const response = await fetch(`${apiUrl}/${id}`, {
                    method: 'DELETE',
                    headers: apiHeaders()
                });

                const result = await response.json();

                if (!response.ok) {
                    showAlert('danger', result.message || 'Gagal menghapus user.');
                    return;
                }

                showAlert('success', result.message || 'User berhasil dihapus.');
                loadUsers();

            } catch (error) {
                showAlert('danger', 'Gagal menghapus user.');
            }
        }

        function showAlert(type, message) {
            const alertBox = document.getElementById('alertBox');

            alertBox.innerHTML = `
                <div class="alert alert-${type} alert-admin">
                    <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill'} me-2"></i>
                    ${escapeHtml(message)}
                </div>
            `;

            setTimeout(() => {
                alertBox.innerHTML = '';
            }, 3500);
        }

        function showCreateErrors(errors) {
            if (errors.name) setInputError('create', 'name', errors.name[0]);
            if (errors.email) setInputError('create', 'email', errors.email[0]);
            if (errors.password) setInputError('create', 'password', errors.password[0]);
        }

        function showEditErrors(errors) {
            if (errors.name) setInputError('edit', 'name', errors.name[0]);
            if (errors.email) setInputError('edit', 'email', errors.email[0]);
            if (errors.password) setInputError('edit', 'password', errors.password[0]);
        }

        function setInputError(prefix, field, message) {
            const input = document.querySelector(`#${prefix}UserForm [name="${field}"]`);
            const error = document.getElementById(`${prefix}-${field}-error`);

            if (input) {
                input.classList.add('is-invalid');
            }

            if (error) {
                error.innerText = message;
                error.style.display = 'block';
            }
        }

        function clearCreateErrors() {
            clearFormErrors('createUserForm', 'create');
        }

        function clearEditErrors() {
            clearFormErrors('editUserForm', 'edit');
        }

        function clearFormErrors(formId, prefix) {
            const form = document.getElementById(formId);

            form.querySelectorAll('.is-invalid').forEach(input => {
                input.classList.remove('is-invalid');
            });

            ['name', 'email', 'password'].forEach(field => {
                const error = document.getElementById(`${prefix}-${field}-error`);
                if (error) {
                    error.innerText = '';
                    error.style.display = 'none';
                }
            });
        }

        function formatDate(dateString) {
            if (!dateString) {
                return '-';
            }

            const date = new Date(dateString);

            return date.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        function escapeHtml(text) {
            if (!text) {
                return '';
            }

            return text
                .toString()
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }
    </script>
@endpush
