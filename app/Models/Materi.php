<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'video_url'];

    public function forumPosts()
    {
        return $this->hasMany(ForumPost::class);
    }
}
