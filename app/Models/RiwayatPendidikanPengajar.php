<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikanPengajar extends Model
{
    use HasFactory;

    protected $table = 'riwayat_pendidikan';

    protected $fillable = [
        'profile_pengajar_id',
        'jenjang',
        'jurusan',
        'institusi',
        'tahun_lulus',
    ];

    public function profilePengajar()
    {
        return $this->belongsTo(ProfilePengajar::class);
    }
}
