<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RiasecResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'realistic_score',
        'investigative_score',
        'artistic_score',
        'social_score',
        'enterprising_score',
        'conventional_score',
        'holland_code',
        'description',
        'status',
        'deleted_at',
    ];

    protected $casts = [
        'deleted_at' => 'date',
    ];

    // ========================================
    // RELASI
    // ========================================

    /**
     * Hasil tes milik satu user (N:1)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Hasil tes punya banyak jawaban (1:N)
     */
    public function answers(): HasMany
    {
        return $this->hasMany(RiasecAnswer::class, 'riasec_result_id');
    }

    // ========================================
    // METHODS
    // ========================================

    /**
     * Hitung dan set kode Holland berdasarkan skor
     * Ambil 3 tipe dengan skor tertinggi
     */
    public function calculateHollandCode(): string
    {
        $scores = [
            'R' => $this->realistic_score,
            'I' => $this->investigative_score,
            'A' => $this->artistic_score,
            'S' => $this->social_score,
            'E' => $this->enterprising_score,
            'C' => $this->conventional_score,
        ];

        // Urutkan dari tertinggi ke terendah
        arsort($scores);

        // Ambil 3 teratas
        $topThree = array_slice($scores, 0, 3);

        // Gabung jadi string (misal: "I-E-C")
        $code = implode('-', array_keys($topThree));

        // Simpan ke database
        $this->holland_code = $code;
        $this->save();

        return $code;
    }

    /**
     * Cek apakah hasil tes sudah expired (> 3 bulan)
     */
    public function isExpired(): bool
    {
        return $this->status === 'expired' || $this->created_at->addMonths(3) < now();
    }

    /**
     * Generate deskripsi hasil berdasarkan kode Holland
     */
    public function generateDescription(): string
    {
        $descriptions = [
            'R' => 'Praktis, teknis, dan hands-on',
            'I' => 'Analitis, riset, dan problem solving',
            'A' => 'Kreatif, ekspresif, dan orisinal',
            'S' => 'Membantu, mengajar, dan berkolaborasi',
            'E' => 'Memimpin, menjual, dan berinisiatif',
            'C' => 'Teratur, detail, dan administratif',
        ];

        $codes = explode('-', $this->holland_code);
        $descriptions = array_map(fn($code) => $descriptions[$code] ?? '', $codes);
        $descriptionsText = implode(', ', array_filter($descriptions));

        return "Kode minat karier Anda: {$this->holland_code}\n\n"
            . "Berdasarkan jawaban Anda, Anda cenderung tertarik pada pekerjaan yang: {$descriptionsText}.\n\n"
            . "Ini adalah indikasi minat awal, bukan penilaian kemampuan Anda. "
            . "Gunakan hasil ini bersama pengalaman, keahlian, lokasi, dan preferensi kerja untuk menemukan lowongan yang lebih relevan.";
    }
}
