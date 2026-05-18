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
        Schema::create('spoilage_records', function (Blueprint $table) {
    $table->id();

    $table->foreignId('fish_type_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->decimal('weight_kg', 10, 2);

    $table->text('reason');

    $table->dateTime('spoilage_date');

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
        Schema::dropIfExists('spoilage_records');
    }
};
