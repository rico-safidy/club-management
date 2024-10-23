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
        Schema::create('stadium_places', function (Blueprint $table) {
            $table->id();
            $table->string('stadium_place_location');
            $table->integer('stadium_place_number');
            $table->integer('stadium_place_number_disponible');
            $table->text('stadium_place_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stadium_places');
    }
};
