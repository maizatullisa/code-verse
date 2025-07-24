@extends('admin.layouts.master')

@section('content')
<h2 class="text-2xl font-bold mb-4">Detail User</h2>
<div class="bg-white p-6 rounded shadow">
    <p><strong>Nama:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
</div>
@endsection