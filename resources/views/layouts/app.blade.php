<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Cafe')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { min-height: 100vh; background-color: #212529; color: #fff; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 10px 16px; display: block; border-radius: 6px; margin-bottom: 4px; }
        .sidebar a:hover, .sidebar a.active { background-color: #343a40; color: #fff; }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3">
            <h5 class="text-white fw-bold mb-1"><i class="bi bi-cup-hot-fill text-warning me-2"></i>Cafe POS</h5>
            <small class="text-secondary d-block mb-4">Role: {{ strtoupper(auth()->user()->role) }}</small>

            @if(auth()->user()->role === 'admin')
                <div class="text-uppercase text-secondary small fw-bold mb-2">Menu Admin</div>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
                {{-- Menu Nabila & Husain akan aktif setelah modul dibuat --}}
                <a href="#" class="disabled text-muted"><i class="bi bi-tags me-2"></i>Kategori (Nabila)</a>
                <a href="#" class="disabled text-muted"><i class="bi bi-list-ul me-2"></i>Menu Cafe (Nabila)</a>
                <a href="#" class="disabled text-muted"><i class="bi bi-people me-2"></i>Akun Kasir (Husain)</a>
                <a href="#" class="disabled text-muted"><i class="bi bi-file-earmark-spreadsheet me-2"></i>Laporan (Sigit)</a>
            @endif

            <div class="text-uppercase text-secondary small fw-bold mt-3 mb-2">Operasional Kasir</div>
            <a href="{{ route('kasir.dashboard') }}" class="{{ request()->routeIs('kasir.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door me-2"></i>Beranda Kasir
            </a>
            {{-- Menu Raffi akan aktif setelah modul dibuat --}}
            <a href="#" class="disabled text-muted"><i class="bi bi-cart4 me-2"></i>POS Kasir (Raffi)</a>
            <a href="#" class="disabled text-muted"><i class="bi bi-hourglass-split me-2"></i>Antrean Pesanan (Raffi)</a>

            <hr class="border-secondary my-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                    <i class="bi bi-box-arrow-left me-1"></i>Keluar
                </button>
            </form>
        </nav>

        <!-- Konten Utama -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="d-flex justify-content-between align-items-center pb-2 mb-4 border-bottom">
                <h4 class="mb-0">@yield('header', 'Dashboard')</h4>
                <span class="text-muted small"><i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name }}</span>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>