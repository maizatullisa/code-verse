<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'gender',
        'role',
        'timezone',
        'email_verified_at',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo
            ? asset('storage/' . $this->profile_photo)   
            : asset('images/default.png');       
    }


     public function markEmailAsVerified()
    {
        return $this->update(['email_verified_at' => now()]);
    }

      public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    public function materis()
    {
        return $this->hasMany(Materi::class, 'pengajar_id');
    }

    public function materiDipelajari()
    {
        return $this->belongsToMany(Materi::class, 'user_materi')
                    ->withPivot('status', 'progress', 'nilai')
                    ->withTimestamps();            
    }

    public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }

    public function balasanDiskusi()
    {
        return $this->hasMany(BalasanDiskusi::class);
    }

    public function enrollments(): HasMany
    {
        return $this->hasMany(enrollment::class);
    }

    public function enrolledClasses(): BelongsToMany
    {
        return $this->belongsToMany(Kelas::class, 'enrollments')
                    ->withPivot(['status', 'enrolled_at', 'completed_at', 'progress'])
                    ->withTimestamps();
    }

    public function activeEnrollments(): HasMany
    {
        return $this->enrollments()->active();
    }

    public function completedEnrollments(): HasMany
    {
        return $this->enrollments()->completed();
    }

    public function isPengajar()
    {
        return $this->role === 'pengajar'; 
    }

        public function materiProgress()
    {
        return $this->hasMany(UserMateriProgress::class);
    }

    public function profilePengajar()
    {
        return $this->hasOne(\App\Models\ProfilePengajar::class, 'user_id');
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function certificates() {
        return $this->hasMany(UserCertificate::class);
    }

    public function hasCompletedCourse($kelasId)
    {
        return UserMateriProgress::isClassCompleted($this->id, $kelasId);
    }

    public function averageQuizScore($kelasId)
    {
        return $this->quizResults()
            ->whereHas('quiz.materi', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            })
            ->avg('score'); 
    }


        public function kelas()
    {
        return $this->hasMany(\App\Models\Kelas::class, 'pengajar_id');
    }

    public function quizResults()
    {
        return $this->hasMany(\App\Models\QuizResult::class, 'user_id');
    }

    public function userMateriProgress()
    {
        return $this->hasMany(\App\Models\UserMateriProgress::class, 'user_id');
    }

    
}
