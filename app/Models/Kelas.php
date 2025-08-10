<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'kategori', 
        'level',
        'deskripsi',
        'durasi',
        'kapasitas',
        'harga',
        'status',
        'cover_image',
        'pengajar_id'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'kapasitas' => 'integer'
    ];

    // Relationship dengan User (Pengajar)
    public function pengajar()
    {
        return $this->belongsTo(User::class, 'pengajar_id');
    }

    // Relationship dengan Materi
    public function materis()
    {
        return $this->hasMany(Materi::class);
    }

    // Scope untuk published
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Scope untuk draft
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    // Accessor untuk format harga
    public function getFormattedHargaAttribute()
    {
        return $this->harga == 0 ? 'Gratis' : 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Accessor untuk format kapasitas
    public function getFormattedKapasitasAttribute()
    {
        return $this->kapasitas >= 9999 ? 'Tidak Terbatas' : $this->kapasitas . ' orang';
    }
}