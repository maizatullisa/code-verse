<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMateriProgress extends Model
{
  protected $table = 'user_materi_progress';

    protected $fillable = [
        'user_id',
        'materi_id',
        'status',
        'completed_at',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // ===== TAMBAHAN METHODS =====
    
    // Scope untuk filter completed materials
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Check apakah user sudah menyelesaikan semua materi di kelas tertentu
    public static function isClassCompleted($userId, $kelasId)
    {
        $totalMateri = \App\Models\Materi::where('kelas_id', $kelasId)
            ->where('status', 'published')
            ->count();

        $completedMateri = self::where('user_id', $userId)
            ->whereHas('materi', function($query) use ($kelasId) {
                $query->where('kelas_id', $kelasId)->where('status', 'published');
            })
            ->where('status', 'completed')
            ->count();

        return $completedMateri >= $totalMateri && $totalMateri > 0;
    }

    // Get completion percentage untuk kelas tertentu
    public static function getClassCompletionPercentage($userId, $kelasId)
    {
        $totalMateri = \App\Models\Materi::where('kelas_id', $kelasId)
            ->where('status', 'published')
            ->count();

        if ($totalMateri == 0) return 0;

        $completedMateri = self::where('user_id', $userId)
            ->whereHas('materi', function($query) use ($kelasId) {
                $query->where('kelas_id', $kelasId)->where('status', 'published');
            })
            ->where('status', 'completed')
            ->count();

        return round(($completedMateri / $totalMateri) * 100);
    }

    
}
