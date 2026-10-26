<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminActivityLog extends Model
{
    use HasFactory;

    public $timestamps = false; // Hanya created_at, tidak updated_at

    protected $fillable = [
        'admin_id',
        'action',
        'model',
        'model_id',
        'description',
        'ip_address',
        'user_agent',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * Log belong to satu admin (N:1)
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    // ========================================
    // SCOPE
    // ========================================

    /**
     * Scope: Filter log berdasarkan action
     */
    public function scopeByAction($query, $action)
    {
        return $query->where('action', $action);
    }

    /**
     * Scope: Filter log berdasarkan admin
     */
    public function scopeByAdmin($query, $adminId)
    {
        return $query->where('admin_id', $adminId);
    }

    /**
     * Scope: Filter log berdasarkan model
     */
    public function scopeByModel($query, $model)
    {
        return $query->where('model', $model);
    }

    /**
     * Scope: Log dari 90 hari terakhir (untuk retention policy)
     */
    public function scopeRecentLogs($query)
    {
        return $query->where('created_at', '>=', now()->subDays(90));
    }
}
