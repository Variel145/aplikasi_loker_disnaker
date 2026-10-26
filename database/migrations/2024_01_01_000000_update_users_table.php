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
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom untuk Google OAuth
            $table->string('google_id')->nullable()->unique()->after('email');
            
            // Tambah role (user/admin/super_admin)
            $table->enum('role', ['pengguna', 'admin', 'super_admin'])
                ->default('pengguna')
                ->after('password');
            
            // Konfirmasi usia >= 18 tahun
            $table->boolean('age_confirmed')
                ->default(false)
                ->after('role');
            
            // Timestamp persetujuan data (consent)
            $table->timestamp('data_consent_at')
                ->nullable()
                ->after('age_confirmed');
            
            // Untuk 2FA admin
            $table->text('two_factor_secret')
                ->nullable()
                ->after('data_consent_at');
            
            $table->text('two_factor_recovery_codes')
                ->nullable()
                ->after('two_factor_secret');
            
            // Soft delete untuk user
            $table->softDeletes()->after('updated_at');
            
            // Tambah index untuk performa query
            $table->index('role');
            $table->index('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['google_id']);
            $table->dropIndex(['role']);
            $table->dropIndex(['email_verified_at']);
            
            $table->dropColumn([
                'google_id',
                'role',
                'age_confirmed',
                'data_consent_at',
                'two_factor_secret',
                'two_factor_recovery_codes',
                'deleted_at',
            ]);
        });
    }
};
