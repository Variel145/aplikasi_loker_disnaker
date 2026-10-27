<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'role',
        'age_confirmed',
        'data_consent_at',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'data_consent_at' => 'datetime',
        'age_confirmed' => 'boolean',
        'password' => 'hashed',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * User punya banyak hasil tes RIASEC (1:N)
     */
    public function riasecResults(): HasMany
    {
        return $this->hasMany(RiasecResult::class);
    }

    /**
     * User punya banyak lowongan yang dibuat (1:N)
     * Hanya untuk admin yang input lowongan
     */
    public function createdJobs(): HasMany
    {
        return $this->hasMany(Job::class, 'created_by');
    }

    /**
     * Admin punya banyak log aktivitas (1:N)
     */
    public function activityLogs(): HasMany
    {
        return $this->hasMany(AdminActivityLog::class, 'admin_id');
    }

    // ========================================
    // HELPER METHODS
    // ========================================

    /**
     * Cek apakah user adalah admin atau super_admin
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'super_admin']);
    }

    /**
     * Cek apakah user adalah super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    /**
     * Cek apakah user adalah pencari kerja
     */
    public function isJobSeeker(): bool
    {
        return $this->role === 'pencari_kerja';
    }

    /**
     * Cek apakah user sudah verify email
     */
    public function hasVerifiedEmail(): bool
    {
        return ! is_null($this->email_verified_at);
    }

    /**
     * Cek apakah user sudah consent data
     */
    public function hasGivenConsent(): bool
    {
        return ! is_null($this->data_consent_at);
    }
}