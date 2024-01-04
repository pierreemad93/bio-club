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
        Schema::create('quizzs', function (Blueprint $table) {
            $table->id();
            $table->string('lo');
            $table->string('question');
            $table->string('answer_1');
            $table->string('answer_2');   
            $table->string('answer_3');
            $table->string('answer_4')->nullable();
            $table->string('correct_answer');
            $table->foreignId('grade_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzs');
    }
};
