<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — CaféNusa.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #F8FAFC;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
        }
        .brand-logo {
            width: 52px;
            height: 52px;
            background-color: #D97706;
            color: #FFFFFF;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .btn-cafe {
            background-color: #D97706;
            border-color: #D97706;
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 12px;
            padding: 11px;
        }
        .btn-cafe:hover {
            background-color: #B45309;
            border-color: #B45309;
            color: #FFFFFF;
        }
        .form-control {
            border-radius: 10px;
            padding: 10px 14px;
            border-color: #CBD5E1;
        }
        .form-control:focus {
            border-color: #D97706;
            box-shadow: 0 0 0 0.2rem rgba(217, 119, 6, 0.15);
        }
    </style>
</head>
<body>
<div class="login-card p-4 p-md-5 mx-3">
    <div class="text-center mb-4">
        <div class="brand-logo mb-3 shadow-sm">
            <i class="bi bi-cup-hot-fill"></i>
        </div>
        <h4 class="fw-bold text-dark mb-1">CaféNusa.</h4>
        <p class="text-muted small mb-0">Smart Cafe & Business Cycle</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger py-2 px-3 small rounded-3 border-0">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label small fw-semibold text-secondary">Email Akun</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="admin@cafe.com" required autofocus>
        </div>
        <div class="mb-4">
            <label class="form-label small fw-semibold text-secondary">Kata Sandi</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-cafe w-100">Masuk ke Sistem</button>
    </form>

    <div class="mt-4 pt-3 border-top small text-muted">
        <div class="fw-semibold text-dark mb-1">Akun Demo Tim:</div>
        <div>Admin: <code>admin@cafe.com</code></div>
        <div>Kasir: <code>kasir@cafe.com</code></div>
    </div>
</div>
</body>
</html>