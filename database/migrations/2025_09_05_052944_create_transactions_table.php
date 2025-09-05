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
        $table->foreignId('id_barang')->constrained('items')->cascadeOnDelete();
        $table->foreignId('id_user')->constrained('users')->cascadeOnDelete();
        $table->enum('tipe_transaksi', ['masuk', 'keluar']);
        $table->integer('jumlah');
        $table->timestamp('tanggal')->useCurrent();
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
