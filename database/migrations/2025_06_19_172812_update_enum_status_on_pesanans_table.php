<?php

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE pesanans MODIFY COLUMN status ENUM(
        'Selesai',
        'Dibatalkan',
        'Sedang Berjalan',
        'Menunggu Pembayaran',
        'Menunggu Konfirmasi Owner',
        'Peminjaman Berlangsung'
        )");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE pesanans MODIFY COLUMN status ENUM(
        'Selesai',
        'Dibatalkan',
        'Sedang Berjalan'
    )");
    }
};
