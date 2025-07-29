<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalasanDiskusi extends Model
{
    use HasFactory;

    protected $table = 'balasan_diskusi';

    protected $fillable = [
        'diskusi_id', 'user_id', 'konten'
    ];

    public function diskusi()
    {
        return $this->belongsTo(Diskusi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
