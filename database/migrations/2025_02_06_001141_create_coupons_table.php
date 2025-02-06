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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Ensure coupon codes are unique
            $table->tinyInteger('percent')->unsigned()->default(0); // Limit to 0-100%
            $table->integer('max_uses')->nullable(); // How many times the coupon can be used
            $table->integer('times_used')->default(0); // Track how many times it has been used
            $table->boolean('is_active')->default(true); // Quick status check
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->foreignId('subject_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->foreignId('pricing_plan_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
