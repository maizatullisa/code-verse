<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePengajar extends Model
{
    use HasFactory;

    protected $table = 'profile_pengajar';

    protected $fillable = [
        'full_name', 'nip', 'birth_date', 'gender', 'address',
        'academic_position', 'expertise', 'faculty', 'study_program',
        'institutional_email', 'personal_email', 'phone', 'whatsapp'
    ];
}
