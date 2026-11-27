@extends('layouts.app')

@section('title', 'Beranda Kasir')
@section('header', 'Beranda Operasional Kasir')

@section('content')
<div class="row g-3">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Transaksi Saya Hari Ini</div>
                <h3 class="fw-bold mb-0">{{ $myTransactions }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="text-muted small">Pesanan Sedang Diproses</div>
                <h3 class="fw-bold mb-0">{{ $activeOrders }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection