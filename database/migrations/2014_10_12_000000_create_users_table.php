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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('email_verified_at')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('country', 10)->nullable()->default('Libya');
            $table->string('address', 500)->nullable();
            $table->enum('status', ['active', 'block'])->default('active');
            $table->dateTime('last_login')->nullable(); // Track last login date
            $table->rememberToken();
            $table->timestamps(); // created_at & updated_at

        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
