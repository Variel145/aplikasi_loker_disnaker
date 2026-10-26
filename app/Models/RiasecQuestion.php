<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RiasecQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_type',
        'text_id',
        'text_en',
        'question_order',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * Soal punya banyak jawaban (1:N)
     */
    public function answers(): HasMany
    {
        return $this->hasMany(RiasecAnswer::class, 'riasec_question_id');
    }

    // ========================================
    // SCOPE
    // ========================================

    /**
     * Scope: Urutkan soal berdasarkan question_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('question_order', 'asc');
    }

    /**
     * Scope: Filter soal berdasarkan tipe
     */
    public function scopeByType($query, $type)
    {
        return $query->where('question_type', $type);
    }
}
