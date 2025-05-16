<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('cars', function (Blueprint $table) {
        $table->string('mileage')->nullable();
        $table->string('baggage')->nullable();
        $table->string('type')->nullable();
        $table->string('brand')->nullable();
        $table->string('location')->nullable();
    });
}

public function down()
{
    Schema::table('cars', function (Blueprint $table) {
        $table->dropColumn(['mileage', 'baggage', 'type', 'brand', 'location']);
    });
}
};
