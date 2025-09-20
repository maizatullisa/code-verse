<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MateriShowController extends Controller
{
    public function index()
    {    $kelasList = Kelas::where('status', 'published')
    ->with(['materis' => function ($query) {
        $query->where('status', 'published')
              ->orderBy('created_at', 'desc');
    }, 'pengajar'])
    ->withCount(['materis' => function ($query) {
        $query->where('status', 'published');
    } ])
    ->orderBy('created_at', 'desc')
    ->get();

        return view('materi', compact('kelasList'));
    }

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

        if ($kelasList->isEmpty()) {
            abort(404, 'Pengajar tidak memiliki kelas dengan materi yang dipublikasikan.');
        }

        $pengajar = $kelasList->first()->pengajar;

        return view('detail', compact('kelasList', 'pengajar'));
    }

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

