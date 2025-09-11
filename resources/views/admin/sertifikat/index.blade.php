@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Sertifikat</h2>

<table class="min-w-full bg-white shadow rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4 text-left">Nama Siswa</th>
            <th class="py-2 px-4 text-left">Kelas</th>
            <th class="py-2 px-4 text-left">Status Progress</th>
        </tr>
    </thead>
    <tbody>
        @forelse($data as $user)
            @foreach($user['kelas_info'] as $kelas)
                <tr>
                    <td class="py-2 px-4">{{ $user['user_name'] }}</td>
                    <td class="py-2 px-4">{{ $kelas['kelas_name'] }}</td>
                    <td class="py-2 px-4">
                        @if($kelas['progress_completed'])
                            <span class="text-green-600 font-semibold">Completed</span>
                        @else
                            <span class="text-red-600 font-semibold">Belum</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        @empty
            <tr>
                <td colspan="3" class="py-4 px-4 text-center text-gray-500">
                    Belum ada data sertifikat
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
