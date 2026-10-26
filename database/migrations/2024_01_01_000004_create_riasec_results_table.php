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
        Schema::create('riasec_results', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke user
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            
            // Skor untuk setiap tipe RIASEC (0-25, karena 5 soal x skala 1-5)
            $table->integer('realistic_score')->default(0);
            $table->integer('investigative_score')->default(0);
            $table->integer('artistic_score')->default(0);
            $table->integer('social_score')->default(0);
            $table->integer('enterprising_score')->default(0);
            $table->integer('conventional_score')->default(0);
            
            // Kode Holland hasil (3 huruf, misal: "SEA")
            // Diisi dari 3 skor tertinggi
            $table->string('holland_code', 3)->nullable();
            
            // Penjelasan hasil (teks panjang)
            // Digenerate dari kombinasi kode Holland
            $table->longText('description')->nullable();
            
            // Status hasil (completed, expired, deleted)
            // Expired = 3 bulan, data detail dihapus tapi riwayat tes tetap
            $table->enum('status', [
                'completed',
                'expired',
                'deleted'
            ])->default('completed');
            
            // Tanggal hasil dihapus (diisi saat sudah lewat 3 bulan)
            $table->date('deleted_at')->nullable();
            
            // Timestamp
            $table->timestamps();
            
            // INDEX
            $table->index('user_id');
            $table->index('holland_code');
            $table->index('status');
            $table->index('created_at'); // Untuk tracking "hasil 3 bulan terakhir"
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riasec_results');
    }
};
