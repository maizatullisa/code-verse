@extends('layouts.admin') {{-- Ganti sesuai layout utama adminmu --}}

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah User Baru</h2>

    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 text-red-700 bg-red-100 p-2 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Nama</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Password</label>
            <input type="password" name="password" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Role</label>
            <select name="role" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- Pilih Role --</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="pengajar" {{ old('role') == 'pengajar' ? 'selected' : '' }}>Pengajar</option>
                <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-semibold">Gender</label>
            <select name="gender" class="w-full border px-3 py-2 rounded" required>
                <option value="">-- Pilih Gender --</option>
                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Simpan User
            </button>
        </div>
    </form>
</div>
@endsection
