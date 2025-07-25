<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
            public function materi() {
            return $this->belongsTo(Materi::class);
        }

        public function user() {
            return $this->belongsTo(User::class);
        }

        public function questions() {
            return $this->hasMany(QuizQuestion::class);
        }

}
