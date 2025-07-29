<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    public function semuaMateri()
{
    $pengajars = Pengajar::with('materis')->get(); 
    return view('materi', compact('pengajars'));
}

}
