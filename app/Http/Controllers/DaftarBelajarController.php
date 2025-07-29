<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Auth;
use Illuminate\Http\Request;

class DaftarBelajarController extends Controller
{
  public function simpan(Request $request)
{
    $request->validate([
        'selected_materis' => 'required|array',
        'selected_materis.*' => 'exists:materis,id'
    ]);

    $user = Auth::user();

    foreach ($request->selected_materis as $materiId) {
        if (!$user->materiDipelajari()->where('materi_id', $materiId)->exists()) {
            $user->materiDipelajari()->attach($materiId, [
                'status' => 'belum',
                'progress' => '0%',
            ]);
        }
    }

    return back()->with('success', 'Materi berhasil ditambahkan ke daftar belajar.');
}

public function show($id)
{
$pengajar = User::with('materis')->findOrFail($id);
$user = Auth::user();
//ambl id materi yg sdh ditambah ke daftar belajar
$materiDipilihUser = $user->materiDipelajari()->pluck('materi_id')->toArray();
return view('detail', compact('pengajar', 'materiDipilihUser'));
}
public function index()
{
    $user = Auth::user();
    $materis = $user->materiDipelajari()
    ->wherePivot('status', 'belum')
    ->with('pengajar')
    ->get();

    return view('kelas', compact('materis'));
}



}

