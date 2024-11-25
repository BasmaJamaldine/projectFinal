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
        Schema::create('ques_projet_f_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('projet_final_id')->constrained('projet_finals')->onDelete('cascade');
            $table->text('question');
            $table->text('correct_answer');
            $table->string('incorrect_answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ques_projet_f_s');
    }
};
