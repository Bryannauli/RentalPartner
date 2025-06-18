<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
                    $table->string('nik')->unique();
                    $table->string('phone')->unique();
                    $table->text('address');
                    $table->string('ktp');
                    $table->string('sim');
                    $table->string('stnk');
                    $table->string('status_verifikasi')->default('pending'); // pending, approved, rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
