<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'deskripsi', 'pengajar_id',
    ];

    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
