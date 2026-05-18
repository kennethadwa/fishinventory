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
        Schema::create('fishermen', function (Blueprint $table) {
    $table->id();

    $table->string('full_name');
    $table->string('contact_number')->nullable();
    $table->text('address')->nullable();
    $table->string('boat_name')->nullable();
    $table->text('notes')->nullable();

    $table->enum('status', ['active', 'inactive'])
          ->default('active');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fishermen');
    }
};
