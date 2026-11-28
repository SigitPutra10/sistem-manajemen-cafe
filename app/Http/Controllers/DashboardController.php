<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    // Dashboard Admin
    public function admin()
    {
        // Mengambil tanggal hari ini
        $today = Carbon::today();

        // Menghitung pendapatan dari transaksi yang selesai hari ini
        $todayRevenue = Transaction::where('status', 'selesai')
            ->whereDate('created_at', $today)
            ->sum('total_amount');

        // Menghitung jumlah transaksi selesai hari ini
        $todayTransactions = Transaction::where('status', 'selesai')
            ->whereDate('created_at', $today)
            ->count();

        // Menghitung jumlah menu
        $totalMenus = Menu::count();

        // Menghitung jumlah kategori
        $totalCategories = Category::count();

        // Mengambil 5 transaksi terbaru
        $recentTransactions = Transaction::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Mengambil tanggal 6 hari sebelum hari ini
        $startDate = Carbon::today()->subDays(6);

        // Mengambil jumlah transaksi selesai per hari
        $transactionsPerDay = Transaction::selectRaw(
                'DATE(created_at) as tanggal, COUNT(*) as jumlah'
            )
            ->where('status', 'selesai')
            ->whereBetween('created_at', [
                $startDate->startOfDay(),
                Carbon::today()->endOfDay()
            ])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get()
            ->keyBy('tanggal');

        // Mengambil total pendapatan selesai per hari
        $revenuePerDay = Transaction::selectRaw(
                'DATE(created_at) as tanggal, SUM(total_amount) as total'
            )
            ->where('status', 'selesai')
            ->whereBetween('created_at', [
                $startDate->copy()->startOfDay(),
                Carbon::today()->endOfDay()
            ])
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get()
            ->keyBy('tanggal');

         // Menyiapkan data untuk grafik
        $chartLabels = [];
        $chartTransactions = [];
        $chartRevenue = [];

        // Membuat daftar 7 hari terakhir
        for ($i = 0; $i < 7; $i++) {

            $date = Carbon::today()->subDays(6 - $i);
            $dateKey = $date->format('Y-m-d');

            // Label tanggal untuk grafik
            $chartLabels[] = $date->format('d/m');

            // Jika tidak ada transaksi, nilainya 0
            $chartTransactions[] = $transactionsPerDay
                ->get($dateKey)->jumlah ?? 0;
            
            // Mengambil pendapatan pada tanggal tersebut
            $chartRevenue[] = $revenuePerDay
                ->get($dateKey)->total ?? 0;
        }

        return view('admin.dashboard', compact(
            'todayRevenue',
            'todayTransactions',
            'totalMenus',
            'totalCategories',
            'recentTransactions',
            'chartLabels',
            'chartTransactions',
            'chartRevenue'
        ));
    }

    // Dashboard Kasir
    public function kasir()
    {
        $today = Carbon::today();

        $myTransactions = Transaction::where('user_id', auth()->id())
            ->whereDate('created_at', $today)
            ->count();

        $activeOrders = Transaction::where('status', 'diproses')
            ->count();

        return view('kasir.dashboard', compact(
            'myTransactions',
            'activeOrders'
        ));
    }
}
