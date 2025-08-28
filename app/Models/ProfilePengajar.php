<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePengajar extends Model
{
    protected $table = 'profile_pengajar';

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'academic_position',
        'expertise',
        'faculty',
        'study_program',
        'personal_email',
        'phone',
        'photo',
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

        public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikanpengajar::class);
    }

}
