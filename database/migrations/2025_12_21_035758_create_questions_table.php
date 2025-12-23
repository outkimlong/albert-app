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
            $table->foreignId('quiz_id')->constrained()->cascadeOnDelete();

            $table->text('question_text')->nullable();
            $table->text('question_latex')->nullable(); 
            // Example:
            // P\left(\frac{x_a + x_b}{2}, \frac{y_a + y_b}{2}\right)

            $table->enum('type', ['mcq', 'true_false', 'equation'])
                  ->default('mcq');

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
