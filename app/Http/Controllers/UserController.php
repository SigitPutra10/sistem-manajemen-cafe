<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. Menampilkan daftar akun kasir
    public function index()
    {
        $users = User::where('role', 'kasir')
            ->latest()
            ->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    // 2. Menampilkan halaman tambah akun
    public function create()
    {
        return view('admin.users.create');
    }

    // 3. Menyimpan akun kasir baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'kasir',
        ]);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun kasir berhasil ditambahkan.');
    }

    // 4. Menampilkan halaman edit akun
    public function edit(User $user)
    {
        // Memastikan akun yang diedit adalah akun kasir
        abort_if($user->role !== 'kasir', 404);

        return view('admin.users.edit', compact('user'));
    }

    // 5. Memperbarui data akun kasir
    public function update(Request $request, User $user)
    {
        abort_if($user->role !== 'kasir', 404);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        // Memperbarui nama dan email
        $user->name = $data['name'];
        $user->email = $data['email'];

        // Password hanya diperbarui jika diisi
        if (!empty($data['password'])) {
            $user->password = $data['password'];
        }

        $user->save();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun kasir berhasil diperbarui.');
    }

    // 6. Menghapus akun kasir
    public function destroy(User $user)
    {
        abort_if($user->role !== 'kasir', 404);

        // Memeriksa apakah kasir memiliki riwayat transaksi
        if ($user->transactions()->exists()) {
            return back()->with(
                'error',
                'Akun tidak dapat dihapus karena memiliki riwayat transaksi.'
            );
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Akun kasir berhasil dihapus.');
    }
}
