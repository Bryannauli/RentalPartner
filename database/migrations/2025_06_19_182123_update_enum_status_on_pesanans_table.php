<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // update enum, ganti 'Sedang Berjalan' jadi 'Menunggu Konfirmasi Pembayaran'
        DB::statement("ALTER TABLE pesanans MODIFY COLUMN status ENUM(
            'Selesai',
            'Dibatalkan',
            'Menunggu Konfirmasi Pembayaran',
            'Menunggu Pembayaran',
            'Menunggu Konfirmasi Owner',
            'Peminjaman Berlangsung'
        ) NOT NULL DEFAULT 'Menunggu Pembayaran'");

        // optional: update data yg masih 'Sedang Berjalan' jadi 'Menunggu Konfirmasi Pembayaran'
        DB::table('pesanans')
            ->where('status', 'Sedang Berjalan')
            ->update(['status' => 'Menunggu Konfirmasi Pembayaran']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // rollback ke enum lama
        DB::statement("ALTER TABLE pesanans MODIFY COLUMN status ENUM(
            'Selesai',
            'Dibatalkan',
            'Sedang Berjalan',
            'Menunggu Pembayaran',
            'Menunggu Konfirmasi Owner',
            'Peminjaman Berlangsung'
        ) NOT NULL DEFAULT 'Menunggu Konfirmasi Owner'");

        // rollback data
        DB::table('pesanans')
            ->where('status', 'Menunggu Konfirmasi Pembayaran')
            ->update(['status' => 'Sedang Berjalan']);
    }
};
