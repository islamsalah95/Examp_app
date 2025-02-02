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
        Schema::create('exam_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_session_id');
            $table->unsignedBigInteger('exam_question_id');
            $table->unsignedBigInteger('exam_answer_id')->default(null);
            $table->timestamps();
        
            // Foreign Key Constraints
            $table->foreign('exam_session_id')->references('id')->on('exam_sessions')->onDelete('cascade');
            $table->foreign('exam_question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('exam_answer_id')->references('id')->on('answers')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_histories');
    }
};
