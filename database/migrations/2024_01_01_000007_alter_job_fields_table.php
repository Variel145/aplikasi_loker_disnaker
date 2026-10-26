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
        Schema::table('job_fields', function (Blueprint $table) {
            // Tambah kolom contoh profesi (optional)
            $table->text('examples_id')->nullable()->after('name_id');
            $table->text('examples_en')->nullable()->after('name_en');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_fields', function (Blueprint $table) {
            $table->dropColumn(['examples_id', 'examples_en']);
        });
    }
};
