<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CaféNusa — Smart Cafe & Business Cycle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --cafe-amber: #D97706;
            --cafe-amber-hover: #B45309;
            --cafe-cream: #FEF3C7;
            --cafe-cream-text: #92400E;
            --cafe-bg: #F8FAFC;
            --cafe-border: #E2E8F0;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--cafe-bg);
            color: #1E293B;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #FFFFFF;
            border-right: 1px solid var(--cafe-border);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .brand-logo {
            width: 42px;
            height: 42px;
            background-color: var(--cafe-amber);
            color: #FFFFFF;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }
        .nav-link-cafe {
            color: #64748B;
            text-decoration: none;
            padding: 11px 16px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 12px;
            font-weight: 500;
            font-size: 0.925rem;
            margin-bottom: 6px;
            transition: all 0.2s ease;
        }
        .nav-link-cafe:hover {
            background-color: #F1F5F9;
            color: #0F172A;
        }
        .nav-link-cafe.active {
            background-color: var(--cafe-cream);
            color: var(--cafe-cream-text);
            font-weight: 600;
        }
        .nav-link-cafe.disabled {
            opacity: 0.55;
            pointer-events: none;
        }
        .btn-cafe {
            background-color: var(--cafe-amber);
            border-color: var(--cafe-amber);
            color: #FFFFFF;
            font-weight: 600;
            border-radius: 10px;
            padding: 9px 18px;
        }
        .btn-cafe:hover {
            background-color: var(--cafe-amber-hover);
            border-color: var(--cafe-amber-hover);
            color: #FFFFFF;
        }
        .card-cafe {
            background-color: #FFFFFF;
            border: 1px solid var(--cafe-border);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.03);
        }
        .icon-badge-amber {
            width: 42px;
            height: 42px;
            background-color: #FEF3C7;
            color: #D97706;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .icon-badge-green {
            width: 42px;
            height: 42px;
            background-color: #DCFCE7;
            color: #16A34A;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .table-cafe thead th {
            background-color: #F8FAFC;
            color: #64748B;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--cafe-border);
            padding: 14px 16px;
        }
        .table-cafe tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #F1F5F9;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Putih Minimalis CaféNusa -->
        <nav class="col-md-3 col-lg-2 sidebar p-4">
            <div>
                <!-- Brand Header -->
                <div class="d-flex align-items-center gap-3 mb-4 pb-2">
                    <div class="brand-logo shadow-sm">
                        <i class="bi bi-cup-hot-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-5 lh-1 text-dark">CaféNusa.</div>
                        <small class="text-muted" style="font-size: 0.72rem;">Smart Cafe & Business Cycle</small>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-link-cafe {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Dashboard & Siklus</span>
                    </a>
                    {{-- Menu Nabila, Husain, & Sigit akan diaktifkan saat PR di-merge --}}
                    <a href="#" class="nav-link-cafe disabled">
                        <i class="bi bi-tags"></i>
                        <span>Kategori (Nabila)</span>
                    </a>
                    <a href="#" class="nav-link-cafe disabled">
                        <i class="bi bi-cup-straw"></i>
                        <span>Manajemen Menu (Nabila)</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link-cafe {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                         <i class="bi bi-people"></i>
                         <span>Akun Kasir (Raffi)</span>
                    </a>
                    <a href="#" class="nav-link-cafe disabled">
                        <i class="bi bi-file-earmark-arrow-down"></i>
                        <span>Laporan & Export (Sigit)</span>
                    </a>
                @endif

                <a href="{{ route('kasir.dashboard') }}" class="nav-link-cafe {{ request()->routeIs('kasir.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-shop"></i>
                    <span>Beranda Kasir</span>
                </a>
                <a href="#" class="nav-link-cafe disabled">
                    <i class="bi bi-receipt"></i>
                    <span>POS Transaksi (Husain)</span>
                </a>
                <a href="#" class="nav-link-cafe disabled">
                    <i class="bi bi-clock-history"></i>
                    <span>Antrean Pesanan (Husain)</span>
                </a>
            </div>

            <!-- Footer Sidebar: Info User & Logout -->
            <div class="pt-3 border-top">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="fw-semibold small text-dark">{{ auth()->user()->name }}</div>
                        <span class="badge rounded-pill" style="background-color: #FEF3C7; color: #92400E; font-size: 0.7rem;">
                            {{ strtoupper(auth()->user()->role) }}
                        </span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-secondary rounded-3" title="Keluar">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Area Konten Utama -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-5 py-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold text-dark mb-1">@yield('header', 'Dashboard')</h3>
                    <p class="text-muted small mb-0">@yield('subheader', 'Pantau operasional dan siklus bisnis CaféNusa.')</p>
                </div>
                <div>
                    @yield('header_action')
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success border-0 rounded-4 shadow-sm alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger border-0 rounded-4 shadow-sm">
                    <ul class="mb-0 small">
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