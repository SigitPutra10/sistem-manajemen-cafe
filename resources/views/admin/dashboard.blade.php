@extends('layouts.app')

@section('title', 'Dashboard & Siklus — CaféNusa.')
@section('header', 'Dashboard & Siklus')
@section('subheader', 'Ringkasan pendapatan, transaksi harian, dan ketersediaan menu CaféNusa.')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="card-cafe p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.72rem; letter-spacing: 0.04em;">PENDAPATAN HARI INI</div>
                    <h3 class="fw-bold text-dark mb-2">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h3>
                    <div class="small text-success fw-medium"><i class="bi bi-graph-up-arrow me-1"></i>Omzet Tercatat</div>
                </div>
                <div class="icon-badge-green">
                    <i class="bi bi-cash-stack fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-cafe p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.72rem; letter-spacing: 0.04em;">TRANSAKSI HARI INI</div>
                    <h3 class="fw-bold text-dark mb-2">{{ $todayTransactions }}</h3>
                    <div class="small text-muted"><i class="bi bi-receipt me-1 text-warning"></i>Struk Selesai</div>
                </div>
                <div class="icon-badge-amber">
                    <i class="bi bi-bag-check-fill fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-cafe p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.72rem; letter-spacing: 0.04em;">MENU TERDAFTAR</div>
                    <h3 class="fw-bold text-dark mb-2">{{ $totalMenus }}</h3>
                    <div class="small text-muted"><i class="bi bi-cup-hot me-1 text-warning"></i>Total Varian Menu</div>
                </div>
                <div class="icon-badge-amber">
                    <i class="bi bi-cup-straw fs-5"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="card-cafe p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.72rem; letter-spacing: 0.04em;">KATEGORI MENU</div>
                    <h3 class="fw-bold text-dark mb-2">{{ $totalCategories }}</h3>
                    <div class="small text-success fw-medium">• Siap Dipesan Pelanggan</div>
                </div>
                <div class="icon-badge-green">
                    <i class="bi bi-check-square-fill fs-5"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-cafe overflow-hidden">
    <div class="p-4 border-bottom bg-white d-flex justify-content-between align-items-center">
        <h6 class="fw-bold text-dark mb-0">Daftar Transaksi Terbaru CaféNusa</h6>
        <span class="badge rounded-pill bg-light text-secondary border">5 Transaksi Terakhir</span>
    </div>
    <div class="table-responsive">
        <table class="table table-cafe mb-0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>KODE INVOICE</th>
                    <th>PELANGGAN</th>
                    <th>KASIR</th>
                    <th>TOTAL</th>
                    <th>METODE</th>
                    <th>STATUS</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentTransactions as $index => $trx)
                    <tr>
                        <td class="text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold text-dark">{{ $trx->invoice_code }}</td>
                        <td>{{ $trx->customer_name }}</td>
                        <td>{{ $trx->user->name }}</td>
                        <td class="fw-semibold">Rp {{ number_format($trx->total_amount, 0, ',', '.') }}</td>
                        <td><span class="badge bg-light text-dark border">{{ strtoupper($trx->payment_method) }}</span></td>
                        <td>
                            <span class="badge rounded-pill" style="background-color: #FEF3C7; color: #92400E;">
                                {{ ucfirst($trx->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-5">
                            Belum ada transaksi terdaftar. Modul POS Kasir sedang disiapkan di branch <strong>raffi</strong>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection