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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id'); // id user yang merupakan owner
            $table->string('car_name');
            $table->string('brand');
            $table->string('type');
            $table->string('transmission');
            $table->string('capacity');
            $table->string('baggage');
            $table->string('facilities');
            $table->string('mileage'); 
            $table->string('year');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->string('location');
            $table->string('photo')->nullable(); 
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // ini tambahan
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
