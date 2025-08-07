<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'email_verified_at'
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

     public function markEmailAsVerified()
    {
        return $this->update(['email_verified_at' => now()]);
    }

      public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

        // Method untuk admin
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
    
}
