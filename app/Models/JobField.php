<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_id',
        'name_en',
        'examples_id',
        'examples_en',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * Bidang punya banyak lowongan (1:N)
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'field_id');
    }
}
