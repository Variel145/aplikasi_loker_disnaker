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
        Schema::create('riasec_questions', function (Blueprint $table) {
            $table->id();
            
            // Tipe RIASEC (R/I/A/S/E/C)
            // R = Realistic (Realistis)
            // I = Investigative (Investigatif)
            // A = Artistic (Artistik)
            // S = Social (Sosial)
            // E = Enterprising (Enterpris/Wirausaha)
            // C = Conventional (Konvensional)
            $table->enum('question_type', ['R', 'I', 'A', 'S', 'E', 'C']);
            
            // Teks soal dalam Bahasa Indonesia & Inggris
            $table->text('text_id'); // "Saya suka bekerja dengan tangan..."
            $table->text('text_en'); // "I enjoy working with my hands..."
            
            // Urutan soal (1-30)
            $table->integer('question_order')->unique();
            
            // Timestamp
            $table->timestamps();
            
            // INDEX
            $table->index('question_type');
            $table->index('question_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riasec_questions');
    }
};
