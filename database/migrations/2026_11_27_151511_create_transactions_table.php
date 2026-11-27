<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_code')->unique();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('customer_name')->default('Pelanggan');
            $table->integer('total_amount');
            $table->integer('paid_amount');
            $table->integer('change_amount')->default(0);
            $table->enum('payment_method', ['tunai', 'qris'])->default('tunai');
            $table->enum('status', ['diproses', 'selesai'])->default('diproses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};