
@extends('layouts.app')

@section('title', 'Tambah Akun Kasir')
@section('header', 'Tambah Akun Kasir')
@section('subheader', 'Tambahkan akun pengguna baru untuk kasir CaféNusa.')

@section('content')

<div class="card-cafe p-4">

    <h5 class="fw-bold mb-4">Form Tambah Akun Kasir</h5>

    <form action="{{ route('admin.users.store') }}" method="POST">

        @csrf

        {{-- Nama Kasir --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kasir</label>

            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Masukkan nama kasir"
                   value="{{ old('name') }}">

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>

            <input type="email"
                   name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="contoh@email.com"
                   value="{{ old('email') }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">Password</label>

            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Minimal 8 karakter">

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Informasi Role --}}
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-1"></i>
            Akun yang dibuat melalui halaman ini otomatis memiliki role
            <strong>Kasir</strong>.
        </div>

        {{-- Tombol --}}
        <div class="d-flex gap-2">

            <button type="submit" class="btn btn-cafe">
                <i class="bi bi-save me-1"></i>
                Simpan Akun
            </button>

            <a href="{{ route('admin.users.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
