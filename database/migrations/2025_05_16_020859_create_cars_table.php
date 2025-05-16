<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
Schema::create('cars', function (Blueprint $table) {
    $table->id();
    $table->string('name');          
    $table->integer('price');        
    $table->integer('seat');        
    $table->string('transmission');  
    $table->year('year');            
    $table->string('image');         
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
