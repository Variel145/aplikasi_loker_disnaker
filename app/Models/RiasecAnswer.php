<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiasecAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'riasec_result_id',
        'riasec_question_id',
        'score',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * Jawaban belong to satu hasil tes (N:1)
     */
    public function result(): BelongsTo
    {
        return $this->belongsTo(RiasecResult::class, 'riasec_result_id');
    }

    /**
     * Jawaban belong to satu soal (N:1)
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(RiasecQuestion::class, 'riasec_question_id');
    }
}
