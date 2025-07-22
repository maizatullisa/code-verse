<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rangkuman extends Model
{
    use HasFactory;

    protected $fillable = [
        'materi_id',
        'isi',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
