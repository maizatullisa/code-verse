@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Tambah Kelas</h2>
<form action="{{ route('admin.kelas.store') }}" method="POST" class="bg-white p-6 rounded shadow">
    @csrf
    <div class="mb-4">
        <label class="block">Nama Kelas</label>
        <input type="text" name="nama_kelas" class="w-full p-2 border rounded">
    </div>
    <div class="mb-4">
        <label class="block">Pengajar</label>
        <select name="pengajar_id" class="w-full p-2 border rounded">
            <!-- Loop pilihan pengajar -->
        </select>
    </div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection