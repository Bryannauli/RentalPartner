<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();

            // foreign keys
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('postingan_id');
            $table->unsignedBigInteger('owner_id');

            // data pribadi
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('ktp_path');
            $table->string('sim_path');

            // detail sewa
            $table->date('start_date');
            $table->date('end_date');
            $table->string('pickup_location');
            $table->string('return_location');

            // status sewa
            $table->enum('status', [
                'Menunggu Konfirmasi Owner',
                'Ditolak Owner',
                'Menunggu Pembayaran User',
                'Menunggu Verifikasi Pembayaran',
                'Dalam Penyewaan',
                'Selesai',
                'Dibatalkan'
            ])->default('Menunggu Konfirmasi Owner');

            $table->text('rejection_reason')->nullable();
            $table->timestamps();

            // foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('postingan_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};

