<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
<div class="card shadow-sm" style="width: 100%; max-width: 400px;">
    <div class="card-body p-4">
        <h4 class="fw-bold text-center mb-1">Manajemen Cafe</h4>
        <p class="text-muted text-center small mb-4">Masuk menggunakan akun Admin atau Kasir</p>

        @if($errors->any())
            <div class="alert alert-danger py-2 small">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="admin@cafe.com" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Masuk</button>
        </form>

        <hr class="my-3">
        <div class="small text-muted">
            <div><strong>Akun Demo Admin:</strong> admin@cafe.com</div>
            <div><strong>Akun Demo Kasir:</strong> kasir@cafe.com</div>
        </div>
    </div>
</div>
</body>
</html>