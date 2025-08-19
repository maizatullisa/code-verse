<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class CourseEnrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kelas_id',
        'full_name',
        'email',
        'whatsapp',
        'birth_date',
        'education',
        'experience',
        'motivation',
        'features',
        'goals',
        'status',
        'newsletter_subscription',
        'enrolled_at'
    ];

    protected $casts = [
        'features' => 'array',
        'birth_date' => 'date',
        'newsletter_subscription' => 'boolean',
        'enrolled_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    // Mutators
    public function setFeaturesAttribute($value)
    {
        $this->attributes['features'] = is_array($value) ? json_encode($value) : $value;
    }

    // Accessors
    public function getFeaturesListAttribute()
    {
        $features = $this->features ?? [];
        $featureLabels = [
            'certificate' => 'Sertifikat Resmi',
            'lifetime' => 'Akses Seumur Hidup',
        ];

        return collect($features)->map(function ($feature) use ($featureLabels) {
            return $featureLabels[$feature] ?? $feature;
        })->toArray();
    }

    public function getExperienceLabelAttribute()
    {
        $labels = [
            'beginner' => 'Pemula (belum pernah belajar)',
            'basic' => 'Dasar (pernah belajar sedikit)',
            'intermediate' => 'Menengah (sudah pernah praktek)',
            'advanced' => 'Advanced (sudah berpengalaman)',
        ];

        return $labels[$this->experience] ?? $this->experience;
    }

    public function getStatusLabelAttribute()
    {
        $labels = [
            'pending' => 'Menunggu Persetujuan',
            'approved' => 'Disetujui',
            'rejected' => 'Ditolak',
            'completed' => 'Selesai',
        ];

        return $labels[$this->status] ?? $this->status;
    }

    // Helper Methods
    public static function isUserEnrolled($userId, $kelasId)
    {
        return self::where('user_id', $userId)
                   ->where('kelas_id', $kelasId)
                   ->exists();
    }

    public function approve()
    {
        $this->update([
            'status' => 'approved',
            'enrolled_at' => Carbon::now()
        ]);
        
        return $this;
    }

    public function reject()
    {
        $this->update(['status' => 'rejected']);
        return $this;
    }

    public function complete()
    {
        $this->update(['status' => 'completed']);
        return $this;
    }
}