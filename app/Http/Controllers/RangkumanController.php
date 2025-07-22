<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Rangkuman;
use Illuminate\Http\Request;

class RangkumanController extends Controller
{
    public function index()
    {
        $rangkumans = Rangkuman::with('materi')->get();
        return view('rangkuman.index', compact('rangkumans'));
    }

    public function create()
    {
        $materis = Materi::all();
        return view('rangkuman.create', compact('materis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'isi' => 'required',
        ]);

        Rangkuman::create($request->all());

        return redirect()->back()->with('success', 'Rangkuman berhasil ditambahkan.');
    }

    public function edit(Rangkuman $rangkuman)
    {
        $materis = Materi::all();
        return view('rangkuman.edit', compact('rangkuman', 'materis'));
    }

    public function update(Request $request, Rangkuman $rangkuman)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'isi' => 'required',
        ]);

        $rangkuman->update($request->all());

        return redirect()->back()->with('success', 'Rangkuman berhasil diperbarui.');
    }

    public function destroy(Rangkuman $rangkuman)
    {
        $rangkuman->delete();
        return redirect()->back()->with('success', 'Rangkuman berhasil dihapus.');
    }
}
