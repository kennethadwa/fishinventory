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
        Schema::create('catch_items', function (Blueprint $table) {
    $table->id();

    $table->foreignId('catch_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('fish_type_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->decimal('weight_kg', 10, 2);

    $table->decimal('buy_price_per_kg', 10, 2);

    $table->decimal('subtotal', 12, 2);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catch_items');
    }
};
