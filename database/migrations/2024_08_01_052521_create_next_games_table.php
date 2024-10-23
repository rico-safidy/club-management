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
        Schema::create('next_games', function (Blueprint $table) {
            $table->id();
            $table->string('home_team');
            $table->string('visitor_team');
            $table->string('match_type');
            $table->string('match_location');
            $table->string('match_date');
            $table->string('match_hour');
            $table->text('match_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('next_games');
    }
};
