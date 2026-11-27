@extends('layouts.app')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard Admin')

@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Pendapatan Hari Ini</div>
                <h4 class="fw-bold mb-0">Rp {{ number_format($todayRevenue, 0, ',', '.') }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Transaksi Hari Ini</div>
                <h4 class="fw-bold mb-0">{{ $todayTransactions }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Total Menu</div>
                <h4 class="fw-bold mb-0">{{ $totalMenus }}</h4>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Total Kategori</div>
                <h4 class="fw-bold mb-0">{{ $totalCategories }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-header bg-white fw-bold">Transaksi Terbaru</div>
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Kode Invoice</th>
                    <th>Pelanggan</th>
                    <th>Kasir</th>
                    <th>Total</th>
                    <th>Metode</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentTransactions as $trx)
                    <tr>
                        <td>{{ $trx->invoice_code }}</td>
                        <td>{{ $trx->customer_name }}</td>
                        <td>{{ $trx->user->name }}</td>
                        <td>Rp {{ number_format($trx->total_amount, 0, ',', '.') }}</td>
                        <td>{{ strtoupper($trx->payment_method) }}</td>
                        <td><span class="badge bg-secondary">{{ $trx->status }}</span></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-3">Belum ada transaksi tercatat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection