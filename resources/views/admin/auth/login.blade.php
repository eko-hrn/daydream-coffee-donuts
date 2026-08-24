<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Day Dream Donuts & Coffee</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --jco-red: #d9232e;
            --jco-dark-red: #a71d24;
            --jco-brown: #5a2d18;
            --jco-text: #7b5a46;
            --jco-border: rgba(217, 35, 46, 0.16);
        }

        * {
            font-family: 'Poppins', sans-serif;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        body {
            background:
                radial-gradient(circle at top left, rgba(217, 35, 46, 0.12), transparent 34%),
                radial-gradient(circle at bottom right, rgba(255, 190, 90, 0.20), transparent 34%),
                linear-gradient(135deg, #fff7ec, #ffffff 55%, #fff1dc);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px;
            color: var(--jco-brown);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            max-height: calc(100vh - 28px);
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid var(--jco-border);
            border-radius: 24px;
            padding: 24px 34px 22px;
            box-shadow: 0 20px 58px rgba(90, 45, 24, 0.13);
            overflow: hidden;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 18px;
        }

        .logo-circle {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #ffffff;
            border: 3px solid rgba(217, 35, 46, 0.16);
            box-shadow: 0 10px 24px rgba(217, 35, 46, 0.13);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .logo-circle img {
            width: 48px;
            height: 48px;
            object-fit: contain;
        }

        .login-title {
            font-size: 25px;
            font-weight: 800;
            color: var(--jco-brown);
            margin-bottom: 4px;
        }

        .login-subtitle {
            color: var(--jco-text);
            font-size: 13px;
            line-height: 1.45;
            margin-bottom: 0;
        }

        .alert {
            border: none;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            padding: 10px 12px;
            margin-bottom: 12px;
        }

        .form-label {
            color: var(--jco-brown);
            font-weight: 700;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .input-group-custom {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--jco-red);
            font-size: 15px;
            z-index: 3;
        }

        .form-control {
            height: 44px;
            border-radius: 14px;
            border: 1px solid var(--jco-border);
            padding-left: 42px;
            color: var(--jco-brown);
            font-weight: 500;
            background: #fffaf5;
            font-size: 13px;
        }

        .form-control::placeholder {
            color: #b69483;
        }

        .form-control:focus {
            border-color: var(--jco-red);
            box-shadow: 0 0 0 0.15rem rgba(217, 35, 46, 0.12);
            background: #ffffff;
        }

        .form-check {
            margin-top: 12px;
        }

        .form-check-input {
            border-color: #d8c6bd;
        }

        .form-check-input:checked {
            background-color: var(--jco-red);
            border-color: var(--jco-red);
        }

        .form-check-label {
            color: var(--jco-text);
            font-weight: 600;
            font-size: 13px;
        }

        .btn-login {
            width: 100%;
            height: 44px;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--jco-red), #ff4b55);
            color: #ffffff;
            font-weight: 800;
            margin-top: 16px;
            box-shadow: 0 12px 26px rgba(217, 35, 46, 0.22);
            transition: 0.25s ease;
            font-size: 14px;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, var(--jco-dark-red), var(--jco-red));
            color: #ffffff;
            transform: translateY(-1px);
        }

        .back-site {
            display: block;
            text-align: center;
            margin-top: 14px;
            color: var(--jco-text);
            text-decoration: none;
            font-weight: 700;
            font-size: 13px;
        }

        .back-site:hover {
            color: var(--jco-red);
        }

        .invalid-feedback {
            font-weight: 600;
            margin-top: 5px;
            font-size: 11px;
        }

        @media (max-height: 650px) {
            .login-card {
                padding: 18px 30px 16px;
                max-width: 400px;
            }

            .logo-circle {
                width: 54px;
                height: 54px;
                margin-bottom: 8px;
            }

            .logo-circle img {
                width: 40px;
                height: 40px;
            }

            .login-title {
                font-size: 22px;
            }

            .login-subtitle {
                font-size: 12px;
            }

            .logo-area {
                margin-bottom: 14px;
            }

            .form-control,
            .btn-login {
                height: 40px;
            }

            .btn-login {
                margin-top: 12px;
            }

            .back-site {
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="logo-area">

            <h1 class="login-title">Admin Login</h1>
            <p class="login-subtitle">
                Day Dream Donuts & Coffee.
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <i class="bi bi-check-circle-fill me-1"></i>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->has('email'))
            <div class="alert alert-danger">
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                {{ $errors->first('email') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>

                <div class="input-group-custom">
                    <i class="bi bi-envelope-fill input-icon"></i>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        placeholder="admin@example.com" autofocus>
                </div>

                @error('email')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-2">
                <label for="password" class="form-label">Password</label>

                <div class="input-group-custom">
                    <i class="bi bi-lock-fill input-icon"></i>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password">
                </div>

                @error('password')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right me-1"></i>
                Login to Dashboard
            </button>
        </form>

        <a href="{{ url('/') }}" class="back-site">
            <i class="bi bi-arrow-left me-1"></i>
            Back to Website
        </a>

    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
