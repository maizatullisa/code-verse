<?php

namespace App\Models;

use finfo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
     use HasFactory;

    protected $table = 'materis';
    
    protected $fillable = [
        'judul',
        'kategori', 
        'deskripsi',
        'level',
        'file_path',
        'file_name',
        'file_size',
        'rangkuman',
        'status',
        'pengajar_id',
        'kelas_id',
        'week_number',
        'order',
        'type'
    ];

    protected $casts = [
        'file_size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationship with User (Pengajar)
    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }
    

    // Relationship with Quiz
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    // Scope untuk status published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope untuk status draft
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessor untuk format file size
    public function getFormattedFileSizeAttribute()
    {
        if (!$this->file_size) return '0 Bytes';
        
        $bytes = $this->file_size;
        $k = 1024;
        $sizes = ['Bytes', 'KB', 'MB', 'GB'];
        $i = floor(log($bytes) / log($k));
        
        return round($bytes / pow($k, $i), 2) . ' ' . $sizes[$i];
    }

    public function siswa()
    {
        return $this->belongsToMany(User::class, 'user_materi')
                    ->withPivot('status', 'progress', 'nilai')
                    ->withTimestamps();
    }

        public function diskusi()
    {
        return $this->hasMany(Diskusi::class);
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

        public function userProgress()
    {
        return $this->hasMany(UserMateriProgress::class);
    }

      public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'materi_id', 'id');
    }

    public function userMateriProgress()
    {
        return $this->hasMany(UserMateriProgress::class);
    }
    

}
