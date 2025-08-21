<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMateriProgress extends Model
{
  protected $table = 'user_materi_progress';

    protected $fillable = [
        'user_id',
        'materi_id',
        'status',
        'completed_at',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
