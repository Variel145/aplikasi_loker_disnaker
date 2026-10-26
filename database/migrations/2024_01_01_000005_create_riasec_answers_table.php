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
        Schema::create('riasec_answers', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke hasil tes
            $table->foreignId('riasec_result_id')
                ->constrained('riasec_results')
                ->onDelete('cascade');
            
            // Relasi ke soal
            $table->foreignId('riasec_question_id')
                ->constrained('riasec_questions')
                ->onDelete('cascade');
            
            // Jawaban (skala 1-5: Sangat Tidak Setuju hingga Sangat Setuju)
            // 1 = Sangat Tidak Setuju
            // 2 = Tidak Setuju
            // 3 = Netral
            // 4 = Setuju
            // 5 = Sangat Setuju
            $table->integer('score')->comment('Skala 1-5');
            
            // Timestamp (untuk audit/logging)
            $table->timestamps();
            
            // INDEX untuk relasi
            $table->unique(['riasec_result_id', 'riasec_question_id']); // Satu user hanya 1x jawab per soal per tes
            $table->index('riasec_result_id');
            $table->index('riasec_question_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riasec_answers');
    }
};
