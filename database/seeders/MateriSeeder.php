<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        // Minggu 1
        Materi::create([
            'judul' => 'Pengenalan Laravel',
            'kategori' => 'Web Development',
            'deskripsi' => 'Dasar-dasar Laravel untuk pemula',
            'level' => 'beginner',
            'week' => 1,
            'pengajar_id' => 1, // pastikan user pengajar dengan id=1 ada
            'status' => 'published',
        ]);

        Materi::create([
            'judul' => 'Routing & Controller',
            'kategori' => 'Web Development',
            'deskripsi' => 'Belajar routing dan controller di Laravel',
            'level' => 'beginner',
            'week' => 1,
            'pengajar_id' => 1,
            'status' => 'published',
        ]);

        // Minggu 2
        Materi::create([
            'judul' => 'Blade Template',
            'kategori' => 'Web Development',
            'deskripsi' => 'Belajar view engine Blade',
            'level' => 'beginner',
            'week' => 2,
            'pengajar_id' => 1,
            'status' => 'published',
        ]);
    }
}
