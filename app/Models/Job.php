<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'company_name',
        'location',
        'education_min',
        'holland_code',
        'field_id',
        'description',
        'contact_value',
        'posted_at',
        'expires_at',
        'status',
        'created_by',
    ];

    protected $casts = [
        'posted_at' => 'date',
        'expires_at' => 'date',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * Job termasuk dalam satu bidang (N:1)
     */
    public function field(): BelongsTo
    {
        return $this->belongsTo(JobField::class, 'field_id');
    }

    /**
     * Job dibuat oleh satu admin (N:1)
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // ========================================
    // SCOPE
    // ========================================

    /**
     * Scope: Hanya lowongan yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'aktif')->where('expires_at', '>=', now()->toDateString());
    }

    /**
     * Scope: Hanya lowongan yang sesuai kode Holland
     */
    public function scopeByHollandCode($query, $codes)
    {
        $codesArray = is_array($codes) ? $codes : [$codes];
        return $query->whereIn('holland_code', $codesArray);
    }
}
