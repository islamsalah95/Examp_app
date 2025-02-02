<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pricing_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the pricing plan
            $table->integer('period_count'); // Number of weeks or months
            $table->enum('period_type', ['weeks', 'months']); // Period type
            $table->enum('status', ['soon', 'active']); // Status of the plan
            $table->decimal('price', 10, 2); // Price of the plan
            $table->integer('discount')->default(0); // Discount amount
            $table->boolean('free_trial')->default(false); // Free trial availability
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->timestamps(); // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_plans');
    }
};
