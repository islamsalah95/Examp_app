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
        Schema::create('pricing_plan_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pricing_plan_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_plan_subject');
    }
};
