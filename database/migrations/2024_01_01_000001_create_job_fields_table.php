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
        Schema::create('job_fields', function (Blueprint $table) {
            $table->id();
            
            // Nama bidang kerja dalam Bahasa Indonesia & Inggris
            $table->string('name_id')->unique();
            $table->string('name_en')->unique();
            
            // Metadata
            $table->timestamps();
            
            // Index untuk pencarian cepat
            $table->index('name_id');
            $table->index('name_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_fields');
    }
};
