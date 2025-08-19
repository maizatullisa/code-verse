<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{

    protected $table = 'diskusi';

    protected $fillable = [
        'kelas_id', 'pengajar_id', 'materi_id', 'user_id', 'konten', 'is_pinned', 'views',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function balasan()
    {
        return $this->hasMany(BalasanDiskusi::class, 'diskusi_id');
    }

    public function diskusiSukas(){
        return $this->hasMany(DiskusiSuka::class, 'diskusi_id');
    }

    // Relationship
    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }







    
    // RELASI BARU - ke kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // HELPER METHODS - Fokus ke Kelas
    public function hasKelas()
    {
        return !is_null($this->kelas_id);
    }

    // Untuk backward compatibility - isi kelas_id dari materi
    public function getKelasId()
    {
        // Kalau sudah ada kelas_id, pakai itu
        if ($this->kelas_id) {
            return $this->kelas_id;
        }
        
        // Kalau belum ada, ambil dari materi (migrasi bertahap)
        return $this->materi->kelas_id ?? null;
    }

    // Ambil nama kelas
    public function getKelasName()
    {
        if ($this->kelas_id) {
            return $this->kelas->nama_kelas ?? 'Kelas';
        }
        
        // Backup dari materi
        return $this->materi->kelas->nama_kelas ?? 'Kelas';
    }
}
