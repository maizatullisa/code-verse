@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Daftar Kelas</h2>
<a href="{{ route('admin.kelas.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded">+ Tambah Kelas</a>
<table class="min-w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4 text-left">Nama Kelas</th>
            <th class="py-2 px-4 text-left">Pengajar</th>
            <th class="py-2 px-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop data kelas -->
    </tbody>
</table>
@endsection
