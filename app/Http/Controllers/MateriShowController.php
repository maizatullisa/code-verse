<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriShowController extends Controller
{
    /**
     * Tampilkan semua kelas yang memiliki materi published
     * Per card = per kelas, dengan info: nama pengajar, nama kelas, jumlah materi, tanggal published
     */
    public function index()
    {
        $kelasList = Kelas::where('status', 'published') // hanya kelas yang published
            ->whereHas('materis', function ($query) {
                $query->where('status', 'published');
            })
            ->with(['materis' => function ($query) {
                $query->where('status', 'published')
                      ->orderBy('created_at', 'desc');
            }, 'pengajar'])
            ->withCount(['materis' => function ($query) {
                $query->where('status', 'published');
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('materi', compact('kelasList'));
    }

    /**
     * Tampilkan detail materi dari pengajar tertentu
     * Menampilkan semua kelas milik pengajar yang memiliki materi published
     */
    public function showByPengajar($id)
    {
        $kelasList = Kelas::where('pengajar_id', $id)
            ->where('status', 'published') // hanya kelas yang published
            ->whereHas('materis', function ($query) {
                $query->where('status', 'published');
            })
            ->with(['materis' => function ($q) {
                $q->where('status', 'published')
                  ->orderBy('created_at', 'desc');
            }, 'pengajar'])
            ->withCount(['materis' => function ($query) {
                $query->where('status', 'published');
            }])
            ->orderBy('created_at', 'desc')
            ->get();

        // Cek apakah pengajar memiliki kelas dengan materi published
        if ($kelasList->isEmpty()) {
            abort(404, 'Pengajar tidak memiliki kelas dengan materi yang dipublikasikan.');
        }

        // Ambil data pengajar untuk ditampilkan di view
        $pengajar = $kelasList->first()->pengajar;

        return view('detail', compact('kelasList', 'pengajar'));
    }

    /**
     * Tampilkan detail kelas tertentu dengan semua materinya
     */
    public function showByKelas($kelasId)
    {
        $kelas = Kelas::where('id', $kelasId)
            ->where('status', 'published')
            ->whereHas('materis', function ($query) {
                $query->where('status', 'published');
            })
            ->with(['materis' => function ($query) {
                $query->where('status', 'published')
                      ->orderBy('created_at', 'desc');
            }, 'pengajar'])
            ->firstOrFail();

        return view('detail-kelas', compact('kelas'));
    }
}

