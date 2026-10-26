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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            
            // Informasi dasar lowongan
            $table->string('title'); // Judul posisi
            $table->string('company_name'); // Nama perusahaan
            $table->string('location'); // Lokasi (kabupaten/kota)
            
            // Persyaratan pendidikan
            $table->enum('education_min', [
                'SMA/SMK',
                'D3',
                'S1',
                'S2',
                'S3'
            ])->nullable();
            
            // Kode Holland (max 3 huruf: R, I, A, S, E, C)
            // Contoh: "SEA", "REC", "IES"
            $table->string('holland_code', 3)->nullable();
            
            // Relasi ke job_fields (bidang kerja)
            $table->foreignId('field_id')
                ->nullable()
                ->constrained('job_fields')
                ->onDelete('set null');
            
            // Deskripsi pekerjaan
            $table->longText('description')->nullable();
            
            // Kontak/cara melamar (email, link, nomor kontak)
            $table->string('contact_value');
            
            // Tanggal posting & expired
            $table->date('posted_at');
            $table->date('expires_at');
            
            // Status lowongan (aktif, expired, dihapus)
            $table->enum('status', [
                'aktif',
                'kadaluarsa',
                'ditutup'
            ])->default('aktif');
            
            // Admin yang membuat lowongan
            $table->foreignId('created_by')
                ->constrained('users')
                ->onDelete('cascade');
            
            // Soft delete (lowongan disembunyikan dulu, baru dihapus 30 hari kemudian)
            $table->softDeletes();
            
            // Timestamp
            $table->timestamps();
            
            // INDEX untuk query performa
            $table->index('status');
            $table->index('expires_at');
            $table->index('holland_code');
            $table->index('field_id');
            $table->index('created_by');
            $table->index(['status', 'expires_at']); // Composite index
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
