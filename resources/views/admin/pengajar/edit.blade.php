<!-- <form action="{{ route('admin.pengajar.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
        <label for="first_name">Nama:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="pengajar" {{ $user->role == 'pengajar' ? 'selected' : '' }}>Pengajar</option>
            <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
        </select>
    </div>
    
    <div class="mb-4">
        <label for="password">Password Baru (kosongkan jika tidak ingin mengubah):</label>
        <input type="password" name="password" id="password">
    </div>
    
    <div class="mb-4">
        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    
    <button type="submit">Update User</button>
</form> -->

@extends('admin.layouts.master')

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-2xl mx-auto px-6">
        <!-- Header Section -->
        <div class="bg-blue-600 rounded-lg p-8 text-white shadow-md mb-8">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h1 class="text-2xl font-bold mb-2">Edit Pengajar 👤</h1>
                    <p class="text-blue-100">Update user information and permissions</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                <span class="text-sm">System Status: Ready for Updates</span>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
            <div class="p-8">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Nama Field -->
                    <div class="space-y-2">
                        <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama:
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="first_name" 
                                id="first_name" 
                                value="{{ old('first_name', $user->first_name) }}" 
                                required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-gray-50 hover:bg-white"
                            >
                        </div>
                    </div>
                    
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                            Email:
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                value="{{ old('email', $user->email) }}" 
                                required
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-gray-50 hover:bg-white"
                            >
                        </div>
                    </div>
                    
                    <!-- Role Field -->
                    <div class="space-y-2">
                        <label for="role" class="block text-sm font-semibold text-gray-700 mb-2">
                            Role:
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                            <select 
                                name="role" 
                                id="role" 
                                required
                                class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-gray-50 hover:bg-white appearance-none cursor-pointer"
                            >
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="pengajar" {{ $user->role == 'pengajar' ? 'selected' : '' }}>Pengajar</option>
                                <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            Password Baru (kosongkan jika tidak ingin mengubah):
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                name="password" 
                                id="password"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-gray-50 hover:bg-white"
                            >
                        </div>
                    </div>
                    
                    <!-- Confirm Password Field -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                            Konfirmasi Password:
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <input 
                                type="password" 
                                name="password_confirmation" 
                                id="password_confirmation"
                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 bg-gray-50 hover:bg-white"
                            >
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="pt-6 border-t border-gray-200">
                        <button 
                            type="submit" 
                            class="w-full px-8 py-3 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200 shadow-md hover:shadow-lg flex items-center justify-center space-x-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                            </svg>
                            <span>Update User</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection