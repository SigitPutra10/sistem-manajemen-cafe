<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Transaction;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function admin()
    {
        $today = Carbon::today();

        $todayRevenue = Transaction::whereDate('created_at', $today)->sum('total_amount');
        $todayTransactions = Transaction::whereDate('created_at', $today)->count();
        $totalMenus = Menu::count();
        $totalCategories = Category::count();
        $recentTransactions = Transaction::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'todayRevenue',
            'todayTransactions',
            'totalMenus',
            'totalCategories',
            'recentTransactions'
        ));
    }

    public function kasir()
    {
        $today = Carbon::today();
        $myTransactions = Transaction::where('user_id', auth()->id())
            ->whereDate('created_at', $today)
            ->count();
        $activeOrders = Transaction::where('status', 'diproses')->count();

        return view('kasir.dashboard', compact('myTransactions', 'activeOrders'));
    }
}