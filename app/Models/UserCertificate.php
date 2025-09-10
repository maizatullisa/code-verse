<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kelas_id',
        'file_path',
        'certificate_number',
        'generated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
