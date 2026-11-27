<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Cafe',
            'email' => 'admin@cafe.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Kasir Satu',
            'email' => 'kasir@cafe.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);

        $kopi = Category::create([
            'name' => 'Kopi',
            'description' => 'Aneka minuman berbasis espresso dan manual brew',
        ]);

        $nonKopi = Category::create([
            'name' => 'Non-Kopi',
            'description' => 'Matcha, cokelat, dan minuman segar',
        ]);

        $makanan = Category::create([
            'name' => 'Makanan Ringan',
            'description' => 'Croissant, kentang goreng, dan pastry',
        ]);

        Menu::create([
            'category_id' => $kopi->id,
            'name' => 'Kopi Susu Gula Aren',
            'price' => 18000,
            'stock' => 50,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $kopi->id,
            'name' => 'Americano Iced',
            'price' => 15000,
            'stock' => 40,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $nonKopi->id,
            'name' => 'Matcha Latte',
            'price' => 22000,
            'stock' => 30,
            'is_available' => true,
        ]);

        Menu::create([
            'category_id' => $makanan->id,
            'name' => 'Butter Croissant',
            'price' => 20000,
            'stock' => 25,
            'is_available' => true,
        ]);
    }
}