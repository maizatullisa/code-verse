<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];

        public function questions(){
        return $this->hasMany(QuizQuestion::class);
    }

        public function materi()
    {
        return $this->belongsTo(Materi::class);
    }


}
