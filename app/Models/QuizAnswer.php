<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
 protected $fillable = [
        'user_id', 'quiz_id', 'question_id', 'selected_option_id',
    ];
  public function user() {
        return $this->belongsTo(User::class);
    }

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function question() {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function selectedOption() {
        return $this->belongsTo(QuizOption::class, 'selected_option_id');
    }
}
