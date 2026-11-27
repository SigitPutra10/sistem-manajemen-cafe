@extends('layouts.app')

@section('title', 'Beranda Kasir — CaféNusa.')
@section('header', 'Beranda Operasional Kasir')
@section('subheader', 'Ringkasan aktivitas kasir dan antrean pesanan aktif hari ini.')

@section('content')
<div class="row g-4">
    <div class="col-md-6">
        <div class="card-cafe p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.72rem; letter-spacing: 0.04em;">TRANSAKSI SAYA HARI INI</div>
                    <h2 class="fw-bold text-dark mb-2">{{ $myTransactions }}</h2>
                    <div class="small text-muted"><i class="bi bi-person-check me-1 text-warning"></i>Dilayani oleh {{ auth()->user()->name }}</div>
                </div>
                <div class="icon-badge-amber">
                    <i class="bi bi-receipt-cutoff fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-cafe p-4 h-100">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="text-uppercase text-muted fw-bold small mb-2" style="font-size: 0.72rem; letter-spacing: 0.04em;">PESANAN SEDANG DIPROSES</div>
                    <h2 class="fw-bold text-dark mb-2">{{ $activeOrders }}</h2>
                    <div class="small text-success fw-medium">• Antrean Dapur & Barista</div>
                </div>
                <div class="icon-badge-green">
                    <i class="bi bi-hourglass-split fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection