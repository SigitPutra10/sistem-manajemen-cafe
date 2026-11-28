
@extends('layouts.app')

@section('title', 'Edit Akun Kasir')
@section('header', 'Edit Akun Kasir')
@section('subheader', 'Perbarui informasi akun pengguna kasir CaféNusa.')

@section('content')

<div class="card-cafe p-4">

    <h5 class="fw-bold mb-4">Form Edit Akun Kasir</h5>

    <form action="{{ route('admin.users.update', $user->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        {{-- Nama Kasir --}}
        <div class="mb-3">
            <label class="form-label fw-semibold">Nama Kasir</label>

            <input type="text"
                   name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name) }}">

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
                   value="{{ old('email', $user->email) }}">

            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                Password Baru
            </label>

            <input type="password"
                   name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Kosongkan jika tidak ingin mengganti password">

            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <small class="text-muted">
                Password lama tetap digunakan jika kolom ini dikosongkan.
            </small>
        </div>

        {{-- Informasi Role --}}
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-1"></i>
            Role akun ini tetap sebagai <strong>Kasir</strong>.
        </div>

        {{-- Tombol --}}
        <div class="d-flex gap-2">

            <button type="submit" class="btn btn-cafe">
                <i class="bi bi-save me-1"></i>
                Simpan Perubahan
            </button>

            <a href="{{ route('admin.users.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
