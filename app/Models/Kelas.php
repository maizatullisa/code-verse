<?php


namespace App\Models;

use App\Models\Diskusi;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'kategori', 
        'level',
        'deskripsi',
        'durasi',
        'kapasitas',
        'harga',
        'status',
        'cover_image',
        'pengajar_id'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'kapasitas' => 'integer'
    ];

    // Relationship dengan User (Pengajar)
    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }

    // Relationship dengan Materi
    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    // Scope untuk published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope untuk draft
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessor untuk format harga
    public function getFormattedHargaAttribute()
    {
        return $this->harga == 0 ? 'Gratis' : 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Accessor untuk format kapasitas
    public function getFormattedKapasitasAttribute()
    {
        return $this->kapasitas >= 9999 ? 'Tidak Terbatas' : $this->kapasitas . ' orang';
    }


    /**
 * Get the enrollments for the class
 */

    /**
     * Get the users enrolled in this class
     */
    public function enrolledUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'enrollments')
                    ->withPivot(['status', 'enrolled_at', 'completed_at', 'progress'])
                    ->withTimestamps();
    }

    /**
     * Get active enrollments count
     */
    public function getActiveEnrollmentsCountAttribute(): int
    {
        return $this->enrollments()->active()->count();
    }

    /**
     * Get completed enrollments count (yang dapat sertifikat)
     */
    public function getCompletedEnrollmentsCountAttribute(): int
    {
        return $this->enrollments()->completed()->count();
    }

    /**
     * Check if user is enrolled in this class
     */
    public function isUserEnrolled($userId): bool
    {
        return $this->enrollments()->where('user_id', $userId)->exists();
    }

    /**
     * Get user enrollment status
     */
    public function getUserEnrollmentStatus($userId): ?string
    {
        $enrollment = $this->enrollments()->where('user_id', $userId)->first();
        return $enrollment ? $enrollment->status : null;
    }

    /**
     * Get user progress in this class
     */
    public function getUserProgress($userId): float
    {
        $enrollment = $this->enrollments()->where('user_id', $userId)->first();
        return $enrollment ? $enrollment->progress : 0;
    }
    
        public function diskusi()
    {
        return $this->hasMany(Diskusi::class); // asumsinya satu kelas punya banyak diskusi
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'course_enrollments', 'kelas_id', 'user_id')
                    ->withTimestamps();
    }

    public function certificates() {
        return $this->hasMany(UserCertificate::class);
    }


      public function enrollments()
    {
        return $this->hasMany(CourseEnrollment::class, 'kelas_id', 'id');
    }

}