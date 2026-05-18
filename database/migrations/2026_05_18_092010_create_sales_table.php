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
        Schema::create('sales', function (Blueprint $table) {
    $table->id();

    $table->foreignId('customer_id')
          ->nullable()
          ->constrained()
          ->nullOnDelete();

    $table->dateTime('sale_date');

    $table->decimal('total_amount', 12, 2)
          ->default(0);

    $table->text('remarks')->nullable();

    $table->foreignId('created_by')
          ->constrained('users');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
