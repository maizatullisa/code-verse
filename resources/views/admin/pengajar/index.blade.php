@extends('admin.layouts.master')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 p-6">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl bg-black font-bold bg-clip-text text-transparent mb-2">
                    Daftar Pengajar
                </h1>
                <p class="text-gray-600 text-lg">Kelola data pengajar dengan mudah</p>
            </div>
            <div class="flex space-x-3">
                <button class="bg-white hover:bg-gray-50 text-gray-700 px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 border border-gray-200">
                    <i class="fas fa-download mr-2"></i>Export
                </button>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8 border border-gray-100">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" 
                        placeholder="Cari pengajar..." 
                        value="{{ request('search') }}"
                        id="searchInput"
                        class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            No
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Pengajar
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Bergabung
                        </th>
                      <th class="px-6 py-4 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Aksi
                    </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Loop data pengajar -->
                        @forelse($users as $index => $user)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            
                        <!-- No -->
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}
                        </td>
                            
                            <!-- Nama -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center">
                                           @if($user->profilePengajar && $user->profilePengajar->photo)
                                            <img src="{{ asset($user->profilePengajar->photo) }}"
                                                class="h-10 w-10 rounded-full object-cover"
                                                alt="Foto {{ $user->first_name }}">
                                        @else
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-pink-400 flex items-center justify-center">
                                                <span class="text-sm font-medium text-white">
                                                    {{ substr($user->first_name, 0, 1) }}
                                                </span>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->first_name }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Email -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>
                            
                            <!-- Status-->
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $timezones = [
                                        'WIB' => 'Asia/Jakarta',   // UTC+7
                                        'WITA' => 'Asia/Makassar', // UTC+8  
                                        'WIT' => 'Asia/Jayapura'   // UTC+9
                                    ];
                                    $tz = $timezones[$user->timezone ?? 'WIB'];
                                @endphp
                                <div class="text-sm">
                                    <div class="font-medium text-gray-900">
                                        {{ $user->created_at->setTimezone($tz)->format('d F Y') }}
                                    </div>
                                    <div class="text-gray-500 text-xs">
                                        {{ $user->created_at->setTimezone($tz)->format('H:i') }} {{ $user->timezone ?? 'WIB' }}
                                    </div>
                                </div>
                            </td>
                            <!-- Aksi -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.pengajar.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <form action="{{ route('admin.pengajar.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                Tidak ada data user
                            </td>
                        </tr>
                        @endforelse
                        <!-- Loop data user di sini -->
                               </tbody>
                </table>
            </div>
            
        <!--SEARCH-->
        <script>
        document.getElementById('searchInput').addEventListener('input', function(e) {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => {
                const url = new URL(window.location);
                if (e.target.value.trim()) {
                    url.searchParams.set('search', e.target.value.trim());
                } else {
                    url.searchParams.delete('search');
                }
                url.searchParams.delete('page');
                window.location.href = url.toString();
            }, 500);
        });
        </script>
       <!-- Pagination -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center text-sm text-gray-700">
                    <span>Menampilkan</span>
                    <select class="mx-2 border border-gray-300 rounded px-2 py-1" onchange="changePerPage(this.value)">
                        <option value="10" {{ request('per_page') == 10 || !request('per_page') ? 'selected' : '' }}>10</option>
                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
                    </select>
                    <span>dari {{ $users->total() }} Pengajar</span>
                </div>
                <div class="flex items-center space-x-2">
                    @if ($users->onFirstPage())
                        <span class="px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $users->previousPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                        @if ($page == $users->currentPage())
                            <span class="px-3 py-2 bg-indigo-600 text-white rounded-lg">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($users->hasMorePages())
                        <a href="{{ $users->nextPageUrl() }}" class="px-3 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="px-3 py-2 border border-gray-300 rounded-lg bg-gray-100 text-gray-400 cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            </div>
        </div>

<script>
function changePerPage(value) {
    const url = new URL(window.location);
    url.searchParams.set('per_page', value);
    url.searchParams.delete('page');
    window.location.href = url.toString();
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection