<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    public function question() {
        return $this->belongsTo(QuizQuestion::class);
    }

}
