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
        Schema::create('admin_activity_logs', function (Blueprint $table) {
            $table->id();
            
            // Admin yang melakukan aksi
            $table->foreignId('admin_id')
                ->constrained('users')
                ->onDelete('cascade');
            
            // Tipe aksi (create, update, delete, etc)
            $table->string('action')->comment('create, update, delete, export, etc');
            
            // Model yang diakses (Job, User, etc)
            $table->string('model')->nullable();
            
            // ID dari record yang diubah
            $table->integer('model_id')->nullable();
            
            // Deskripsi aksi (yang berubah, dari apa ke apa)
            $table->text('description')->nullable();
            
            // IP address admin (untuk tracking keamanan)
            $table->string('ip_address')->nullable();
            
            // User agent (browser/device)
            $table->text('user_agent')->nullable();
            
            // Timestamp aksi
            $table->timestamp('created_at')->useCurrent();
            
            // PENTING: Log dihapus otomatis setelah 90 hari (privacy)
            // Setup di scheduler Laravel
            
            // INDEX
            $table->index('admin_id');
            $table->index('action');
            $table->index('created_at');
            $table->index(['model', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_activity_logs');
    }
};
