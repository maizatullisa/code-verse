<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{

    protected $table = 'diskusi';

    protected $fillable = [
        'pengajar_id', 'materi_id', 'user_id', 'konten', 'is_pinned', 'views'
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function balasan()
    {
        return $this->hasMany(BalasanDiskusi::class, 'diskusi_id');
    }

    public function diskusiSukas(){
        return $this->hasMany(DiskusiSuka::class, 'diskusi_id');
    }

    // Relationship
    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }
}
