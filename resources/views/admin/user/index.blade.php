@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Manajemen Users</h2>
<table class="min-w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4 text-left">#</th>
            <th class="py-2 px-4 text-left">Nama</th>
            <th class="py-2 px-4 text-left">Email</th>
            <th class="py-2 px-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop data user di sini -->
    </tbody>
</table>
@endsection