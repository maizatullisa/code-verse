@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Quiz</h2>
<table class="min-w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4 text-left">Judul</th>
            <th class="py-2 px-4 text-left">Kelas</th>
            <th class="py-2 px-4 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <!-- Loop data quiz -->
    </tbody>
</table>
@endsection
