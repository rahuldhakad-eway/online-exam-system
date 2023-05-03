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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('technology_id');
            $table->integer('level_id');
            $table->text('question_text');
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->string('option4');
            $table->enum('answer_type', [1, 2]);
            $table->enum('answer', [1, 2, 3, 4]);
            $table->integer('time_required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
