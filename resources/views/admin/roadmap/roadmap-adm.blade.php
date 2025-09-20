@extends('admin.layout.master-admin')

@section('title', 'Admin - Roadmap Management')

@section('page-title', 'Roadmap Management')

@section('content')
<div class="container mx-auto px-4 sm:px-6 py-4 sm:py-8 max-w-full overflow-x-hidden">
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow-sm border p-4 sm:p-6 mb-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-semibold text-gray-900">
                    Roadmap Management
                </h1>
                <p class="text-gray-600 text-sm sm:text-base">Kelola learning roadmap untuk pengguna</p>
            </div>
            <button onclick="openCreateModal()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 text-sm sm:text-base">
                Tambah Roadmap
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-sm border p-4">
            <div class="text-center">
                <p class="text-gray-600 text-xs sm:text-sm mb-1">Total Roadmaps</p>
                <p class="text-xl sm:text-2xl font-semibold text-gray-900">{{ $totalRoadmaps ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border p-4">
            <div class="text-center">
                <p class="text-gray-600 text-xs sm:text-sm mb-1">Active Roadmaps</p>
                <p class="text-xl sm:text-2xl font-semibold text-green-600">{{ $activeRoadmaps ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border p-4">
            <div class="text-center">
                <p class="text-gray-600 text-xs sm:text-sm mb-1">Categories</p>
                <p class="text-xl sm:text-2xl font-semibold text-blue-600">{{ $categoriesCount ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border p-4">
            <div class="text-center">
                <p class="text-gray-600 text-xs sm:text-sm mb-1">Total Steps</p>
                <p class="text-xl sm:text-2xl font-semibold text-purple-600">{{ $totalSteps ?? 0 }}</p>
            </div>
        </div>
    </div>

    <!-- Filter and Search -->
    <div class="bg-white rounded-lg shadow-sm border p-4 sm:p-6 mb-6">
        <div class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <input type="text" 
                       id="search-roadmap" 
                       placeholder="Cari roadmap..." 
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
            </div>
            <div class="flex-1 sm:flex-none">
                <select id="filter-category" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option value="">Semua Kategori</option>
                    <option value="web-development">Web Development</option>
                    <option value="mobile-development">Mobile Development</option>
                    <option value="data-science">Data Science</option>
                    <option value="ai-ml">AI & Machine Learning</option>
                    <option value="devops">DevOps</option>
                    <option value="cybersecurity">Cybersecurity</option>
                </select>
            </div>
            <div class="flex-1 sm:flex-none">
                <select id="filter-status" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                    <option value="">Semua Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Mobile Cards / Desktop Table -->
    <div class="bg-white rounded-lg shadow-sm border overflow-hidden">
        <!-- Mobile View -->
        <div class="block sm:hidden">
            <div class="divide-y divide-gray-200">
                @forelse($roadmaps ?? [] as $roadmap)
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-medium text-gray-900 text-sm">{{ $roadmap->title }}</h3>
                        <div class="flex space-x-1 sm:space-x-2">
                            <button onclick="viewRoadmap({{ $roadmap->id }})" 
                                    class="px-2 py-1 text-xs text-blue-600 hover:bg-blue-50 rounded border border-blue-200">
                                View
                            </button>
                            <button onclick="editRoadmap({{ $roadmap->id }})" 
                                    class="px-2 py-1 text-xs text-gray-600 hover:bg-gray-50 rounded border border-gray-200">
                                Edit
                            </button>
                            <button onclick="deleteRoadmap({{ $roadmap->id }})" 
                                    class="px-2 py-1 text-xs text-red-600 hover:bg-red-50 rounded border border-red-200">
                                Delete
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-600 text-xs mb-3">{{ Str::limit($roadmap->description, 60) }}</p>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                            {{ $roadmap->category }}
                        </span>
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $roadmap->level == 'beginner' ? 'bg-green-100 text-green-800' : 
                               ($roadmap->level == 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                            {{ ucfirst($roadmap->level) }}
                        </span>
                        <span class="px-2 py-1 text-xs rounded-full 
                            {{ $roadmap->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($roadmap->status) }}
                        </span>
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">
                            {{ $roadmap->steps_count ?? 0 }} steps
                        </span>
                    </div>
                    <p class="text-gray-500 text-xs mt-2">{{ $roadmap->created_at->format('d M Y') }}</p>
                </div>
                @empty
                <div class="p-8 text-center">
                    <p class="text-gray-500 mb-2">Belum ada roadmap</p>
                    <p class="text-sm text-gray-400">Mulai dengan membuat roadmap pertama Anda</p>
                </div>
                @endforelse
            </div>
        </div>

        <!-- Desktop Table -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Roadmap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Steps</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Level</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($roadmaps ?? [] as $roadmap)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $roadmap->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($roadmap->description, 50) }}</div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                {{ $roadmap->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $roadmap->steps_count ?? 0 }} steps</td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                {{ $roadmap->level == 'beginner' ? 'bg-green-100 text-green-800' : 
                                   ($roadmap->level == 'intermediate' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($roadmap->level) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs font-medium rounded-full 
                                {{ $roadmap->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                {{ ucfirst($roadmap->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $roadmap->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <button onclick="viewRoadmap({{ $roadmap->id }})" 
                                        class="px-3 py-1 text-xs text-blue-600 hover:bg-blue-50 rounded border border-blue-200">
                                    View
                                </button>
                                <button onclick="editRoadmap({{ $roadmap->id }})" 
                                        class="px-3 py-1 text-xs text-gray-600 hover:bg-gray-50 rounded border border-gray-200">
                                    Edit
                                </button>
                                <button onclick="deleteRoadmap({{ $roadmap->id }})" 
                                        class="px-3 py-1 text-xs text-red-600 hover:bg-red-50 rounded border border-red-200">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                            <div>
                                <p class="text-lg font-medium mb-2">Belum ada roadmap</p>
                                <p class="text-sm">Mulai dengan membuat roadmap pertama Anda</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if(isset($roadmaps) && $roadmaps->hasPages())
    <div class="mt-6">
        {{ $roadmaps->links() }}
    </div>
    @endif
</div>

<!-- Create/Edit Modal -->
<div id="roadmapModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-full sm:max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="p-4 sm:p-6 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 id="modalTitle" class="text-xl sm:text-2xl font-semibold text-gray-900">Tambah Roadmap Baru</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 p-1">
                    <span class="text-xl">&times;</span>
                </button>
            </div>
        </div>

        <form id="roadmapForm" class="p-4 sm:p-6 space-y-6">
            @csrf
            <input type="hidden" id="roadmapId" name="id">
            
            <!-- Basic Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Judul Roadmap *</label>
                    <input type="text" id="title" name="title" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                           placeholder="Frontend Web Development">
                </div>
                
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                    <select id="category" name="category" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="">Pilih Kategori</option>
                        <option value="web-development">Web Development</option>
                        <option value="mobile-development">Mobile Development</option>
                        <option value="data-science">Data Science</option>
                        <option value="ai-ml">AI & Machine Learning</option>
                        <option value="devops">DevOps</option>
                        <option value="cybersecurity">Cybersecurity</option>
                        <option value="blockchain">Blockchain</option>
                        <option value="game-development">Game Development</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Level *</label>
                    <select id="level" name="level" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="">Pilih Level</option>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </div>
                
                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Estimasi Durasi *</label>
                    <input type="text" id="duration" name="duration" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                           placeholder="6 bulan">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi *</label>
                <textarea id="description" name="description" rows="4" required
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                          placeholder="Jelaskan tujuan dan overview roadmap ini..."></textarea>
            </div>

            <div>
                <label for="prerequisites" class="block text-sm font-medium text-gray-700 mb-2">Prerequisites</label>
                <textarea id="prerequisites" name="prerequisites" rows="2"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm"
                          placeholder="Pengetahuan yang diperlukan sebelum memulai roadmap ini..."></textarea>
            </div>

            <!-- Roadmap Steps -->
            <div>
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 sm:gap-0 mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Langkah-langkah Roadmap</h3>
                    <button type="button" onclick="addStep()" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors text-sm">
                        Tambah Step
                    </button>
                </div>
                
                <div id="stepsContainer" class="space-y-4">
                    <!-- Steps will be added dynamically -->
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Warna Theme</label>
                    <select id="color" name="color"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="from-blue-500 to-indigo-600">Blue to Indigo</option>
                        <option value="from-purple-500 to-pink-600">Purple to Pink</option>
                        <option value="from-green-500 to-teal-600">Green to Teal</option>
                        <option value="from-orange-500 to-red-600">Orange to Red</option>
                        <option value="from-cyan-500 to-blue-600">Cyan to Blue</option>
                    </select>
                </div>
                
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                    <select id="status" name="status" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-4">
                <button type="button" onclick="closeModal()" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 text-sm">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm">
                    Simpan Roadmap
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
