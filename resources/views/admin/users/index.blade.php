
@extends('layouts.app')

@section('title', 'Manajemen Akun Kasir')
@section('header', 'Manajemen Akun Kasir')
@section('subheader', 'Kelola data akun pengguna kasir CaféNusa.')

@section('content')

<div class="card-cafe p-4">

    {{-- Header halaman --}}
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>
            <h5 class="fw-bold mb-1">Daftar Akun Kasir</h5>
            <p class="text-muted mb-0">
                Berikut adalah daftar akun yang memiliki akses sebagai kasir.
            </p>
        </div>

        <a href="{{ route('admin.users.create') }}" class="btn btn-cafe">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Akun Kasir
        </a>

    </div>

    {{-- Pesan berhasil --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}

            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel akun kasir --}}
    <div class="table-responsive">

        <table class="table table-cafe align-middle">

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kasir</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Dibuat</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($users as $index => $user)

                    <tr>
                        <td>
                            {{ $users->firstItem() + $index }}
                        </td>

                        <td class="fw-semibold">
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            <span class="badge rounded-pill"
                                  style="background:#FEF3C7;color:#92400E;">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>

                        <td>
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>

                        <td class="text-center">

                            <div class="d-flex justify-content-center gap-2">

                                {{-- Tombol edit --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit akun">

                                    <i class="bi bi-pencil-square"></i>

                                </a>

                                {{-- Tombol hapus --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus akun kasir ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus akun">

                                        <i class="bi bi-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-5">

                            <i class="bi bi-people fs-1 text-secondary"></i>

                            <h6 class="fw-bold mt-3">
                                Belum Ada Akun Kasir
                            </h6>

                            <p class="text-muted mb-3">
                                Silakan tambahkan akun kasir terlebih dahulu.
                            </p>

                            <a href="{{ route('admin.users.create') }}"
                               class="btn btn-cafe">

                                <i class="bi bi-plus-circle me-1"></i>
                                Tambah Akun

                            </a>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Navigasi halaman --}}
    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>

@endsection
