<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class MateriBladeSearch extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $search = $request->get('search');
        
        // Ambil data materi yang sudah dipublish dengan informasi pengajar
        $query = Kelas::where('status', 'published')
                        ->with('pengajar')
                        ->select('id', 'nama_kelas', 'kategori', 'deskripsi', 'level', 'pengajar_id', 'created_at')
                        ->orderBy('created_at', 'desc');
        
       
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_kelas', 'like', '%' . $search . '%')
                  ->orWhere('kategori', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        }
        
        // Pagination
        $materis = $query->paginate($perPage);
        
        // Preserve query parameters untuk pagination
        $materis->appends($request->query());
        
        // Total materi yang dipublish
        $totalMateri = Kelas::where('status', 'published')->count();
        
        return view('home', compact('kelas', 'totalKelas'));
    }
}