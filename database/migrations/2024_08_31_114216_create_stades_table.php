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
        Schema::create('stades', function (Blueprint $table) {
            $table->id();
            $table->string('stade_name');
            $table->string('stade_location');
            $table->integer('stade_place_number');
            $table->integer('stade_place_location_number_disponible');
            $table->integer('stade_place_number_disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stades');
    }
};
