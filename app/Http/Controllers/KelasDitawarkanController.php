<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\CourseEnrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasDitawarkanController extends Controller
{
  public function tampil(Request $request) 
    {
        // Ambil keyword dari input search (query string)
        $keyword = $request->input('search');
        $kategori = $request->input('kategori');

        $kelasQuery = Kelas::where('status', 'published')
            ->with(['materis' => function ($query) {
                $query->where('status', 'published')
                      ->orderBy('created_at', 'desc');
            }, 'pengajar'])
            ->withCount(['materis' => function ($query) {
                $query->where('status', 'published');
            }
         ,'siswa as siswa_count'
        ]);

        $enrolledClassIds = [];

        if (Auth::check()) {
            $enrolledClassIds = \App\Models\CourseEnrollment::where('user_id', Auth::id())
                                    ->pluck('kelas_id')
                                    ->toArray();
        }


        // keyword pencarian, filter data
        if (!empty($keyword)) {
            $kelasQuery->where(function ($query) use ($keyword) {
                $query->where('nama_kelas', 'LIKE', "%{$keyword}%")
                      ->orWhere('deskripsi', 'LIKE', "%{$keyword}%");
            });
        }

          // Filter berdasarkan kategori
        if (!empty($kategori) && $kategori !== 'all') {
            $kelasQuery->where('kategori', $kategori);
        }

        $kelasList = $kelasQuery->orderBy('created_at', 'desc')
                                ->paginate(6)
                                ->appends($request->all());  



        return view('desktop.pages.kelas.kelas-ditawarkan', compact('kelasList', 'keyword', 'kategori', 'enrolledClassIds'));
    }
}
