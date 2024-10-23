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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_charge_id');
            $table->string('invoice_number');
            $table->string('article_name');
            $table->string('article_size');
            $table->string('article_color');
            $table->string('article_number');
            $table->string('article_price');
            $table->string('customer_name');
            $table->string('customer_adress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
