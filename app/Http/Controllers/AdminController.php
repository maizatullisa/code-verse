<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()//menampilkan semua users
   {
    $users = User::all();
    return view('admin', compact('users'));//bagian view bisa diubah ke admin.users.index -> untuk menandai di dalam halaman
   }
   public function edit(User $user)
   {
    return view('admin', compact('user'));
   }
   public function update (Request $request, User $user)
   {
    $user->update($request->only('first_name','email','role'));

    return redirect()->route('admin.users.index');//edit ini nanti sesuaikan dengan frontend
   }
   public function destroy(User $user) 
   {
    $user->delete();
    return back();
   }

}
