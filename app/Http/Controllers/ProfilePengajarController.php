<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPendidikanPengajar;
use App\Models\ProfilePengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePengajarController extends Controller
{
    /**
     * Halaman index biodata (tampilan biodata pengajar setelah diisi).
     */
    public function index()
    {
        $user = Auth::user();
        $profile = ProfilePengajar::where('user_id', Auth::id())->first();
        $educationHistory = collect();

        return view('pengajar.index-bio', compact('profile', 'user', 'educationHistory'));
    }

    /**
     * Halaman form edit biodata.
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = ProfilePengajar::where('user_id', $user->id)->first();

        return view('pengajar.form-bio', compact('profile', 'user'));
    }

    /**
     * Simpan data baru (pertama kali tambah biodata).
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'personal_email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'gender' => 'nullable|string|max:10',
            'academic_position' => 'nullable|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'expertise' => 'nullable|string|max:255',
            'study_program' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             
        ]);

        $data = $request->only([
            'full_name','personal_email',
            'phone', 'gender', 'academic_position',
            'faculty', 'expertise', 'study_program'
        ]);

        // kalau upload foto baru
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/foto_pengajar'), $fileName);
            $data['photo'] = 'uploads/foto_pengajar/' . $fileName;
        }

        $data['user_id'] = Auth::id();

        ProfilePengajar::create($data);

        return redirect()->route('pengajar.index-bio')->with('success', 'Biodata berhasil ditambahkan.');
    }

    /**
     * Update data biodata (jika sudah ada).
     */
    public function update(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'personal_email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'gender' => 'nullable|string|max:10',
            'academic_position' => 'nullable|string|max:255',
            'faculty' => 'nullable|string|max:255',
            'expertise' => 'nullable|string|max:255',
            'study_program' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = ProfilePengajar::where('user_id', Auth::id())->first();

        $data = $request->only([
            'full_name', 'personal_email',
            'phone', 'gender', 'academic_position',
            'faculty', 'expertise', 'study_program'
        ]);

        // kalau upload foto baru
        if ($request->hasFile('photo')) {
            $fileName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/foto_pengajar'), $fileName);
            $data['photo'] = 'uploads/foto_pengajar/' . $fileName;
        }

        $profile->update($data);

        return redirect()->route('pengajar.index-bio')->with('success', 'Biodata berhasil diperbarui.');
    }

    // Riwayat Pendidikan
    public function storeRiwayatPendidikan(Request $request)
{
    $request->validate([
        'jenjang' => 'required|string|max:50',
        'jurusan' => 'required|string|max:100',
        'institusi' => 'required|string|max:100',
        'tahun_lulus' => 'nullable|digits:4|integer',
    ]);

    $profile = ProfilePengajar::where('user_id', Auth::id())->firstOrFail();

    $profile->riwayatPendidikan()->create($request->all());

    return redirect()->back()->with('success', 'Riwayat pendidikan berhasil ditambahkan.');
}

    public function updateRiwayatPendidikan(Request $request, $id)
    {
        $riwayat = RiwayatPendidikanPengajar::findOrFail($id);

        $riwayat->update($request->validate([
            'jenjang' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
            'institusi' => 'required|string|max:100',
            'tahun_lulus' => 'nullable|digits:4|integer',
        ]));

        return redirect()->back()->with('success', 'Riwayat pendidikan berhasil diperbarui.');
    }

    public function destroyRiwayatPendidikan($id)
    {
        $riwayat = RiwayatPendidikanPengajar::findOrFail($id);
        $riwayat->delete();

        return redirect()->back()->with('success', 'Riwayat pendidikan berhasil dihapus.');
    }

}
