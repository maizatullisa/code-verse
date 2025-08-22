@extends('desktop.layout.master-desktop')

@section('title', 'Code Verse - Dashboard Desktop')

@section('page-title', 'Code Verse')

@section('content')
<style>
    .modal-backdrop {
        backdrop-filter: blur(5px);
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 9999; /* Pastikan z-index lebih tinggi dari sidebar */
    }
    
    .modal-enter {
        animation: modalEnter 0.3s ease-out;
    }
    
    @keyframes modalEnter {
        from {
            opacity: 0;
            transform: scale(0.9) translateY(-20px);
        }
        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }
    
    @media (max-width: 640px) {
        #teacherModal .max-w-2xl {
            max-width: 95%;
        }
        #teacherModal .flex {
            flex-direction: column;
        }
    }

    /* Hide bottom navbar when modal is open */
    body.modal-open .bottom-navigation,
    body.modal-open .bottom-nav,
    body.modal-open .navbar-bottom,
    body.modal-open .fixed.bottom-0,
    body.modal-open [class*="bottom-"],
    body.modal-open .bg-white.border-t {
        display: none !important;
    }
    
    /* Ensure modal is above everything */
    #teacherModal {
        z-index: 10000 !important;
    }
</style>

<div class="min-h-screen bg-gray-50">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b">
        <div class="max-w-6xl mx-auto px-6 py-8">
            <h1 class="text-4xl font-bold text-gray-900 text-center mb-2">Code Verse</h1>
            <p class="text-gray-600 text-center text-lg">
                Platform Pembelajaran Online Untuk Para Coder
            </p>
        </div>
    </div>

    <!-- Coba jelajahi -->
    <div class="max-w-6xl mx-auto px-6 mb-16 top-10px">
        <h2 class="text-2xl font-semibold text-gray-800 mb-8 text-center">Coba Jelajahi</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <a href="{{ url('/coding-tips') }}" class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-lightbulb text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-emerald-600 transition-colors">Coding Tips</p>
            </a>

            <a href="{{ url('/games/pilih-game') }}" class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-puzzle-piece text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-orange-600 transition-colors">Games</p>
            </a>

            <a href="{{ url('/glossary') }}" class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-blue-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-book text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">Glossary</p>
            </a>

            <a href="{{ url('/keyboard-shortcuts') }}" class="flex flex-col items-center gap-4 quiz-category-item cursor-pointer group">
                <div class="w-20 h-20 bg-purple-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-keyboard text-white text-3xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700 group-hover:text-purple-600 transition-colors">Shortcuts</p>
            </a>
        </div>

        <!-- Decorative Element -->
        <div class="flex justify-center items-center mt-12">
            <div class="flex space-x-2">
                <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                <div class="w-3 h-3 bg-emerald-500 rounded-full"></div>
                <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                <div class="w-3 h-3 bg-purple-500 rounded-full"></div>
            </div>
        </div>
    </div>

    <!-- banner -->
    <div class="max-w-6xl mx-auto px-6 mb-16">
        <div class="bg-blue-600 rounded-3xl p-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white bg-opacity-10 rounded-full -translate-y-16 translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white bg-opacity-10 rounded-full translate-y-12 -translate-x-12"></div>
            <div class="relative flex justify-between items-center">
                <div class="text-white">
                    <p class="text-xl mb-2 font-medium">nanti bisa dikasih apa yng kita mau</p>
                    <p class="text-6xl font-bold mb-2">disini%</p>
                    <p class="text-xl font-medium">dan disini</p>
                </div>
                <div class="hidden md:block">
                    <div class="w-40 h-32 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center">
                        <i class="ph ph-users text-white text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommended Materials -->
    <div class="max-w-6xl mx-auto px-6 mb-16 top-10px">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <!-- Timer Header -->
                <div class="bg-blue-50 px-8 py-6">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="text-gray-600 font-medium text-2xl">Rekomendasi kelas</span>
                        </div>
                        <a href="{{ url('/desktop/kelas-ditawarkan') }}" 
                           class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Lihat Semua
                        </a>
                    </div>
                </div>

                <!-- Quiz Content -->
            </div>
        </div>
    </div>

    <!-- Best Teachers -->
    <div class="max-w-6xl mx-auto px-6 mb-20">
        <div class="flex justify-between items-center mb-8">
            <div class="flex items-center gap-3">
                <i class="ph-fill ph-trophy text-2xl text-blue-600"></i>
                <h3 class="text-2xl font-semibold text-gray-800">Pengajar</h3>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Teacher 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-yellow-100 border border-yellow-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <i class="ph-fill ph-trophy text-yellow-600"></i>
                        <span class="text-sm font-bold text-yellow-800">id : 03</span>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Budi</h4>
                    <p class="text-gray-500 text-sm mb-4">bidang keahlian</p>
                    <button onclick="openTeacherModal(1, 'Budi', 'S1. Teknik Informatika Universitas Brawijaya 2018<br>S2. Computer Science ITB 2021', 'Full Stack Developer')" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Lihat
                    </button>
                </div>
            </div>

            <!-- Teacher 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-gray-100 border border-gray-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <span class="text-sm font-bold text-gray-700">id : 02</span>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Andi</h4>
                    <p class="text-gray-500 text-sm mb-4">bidang keahlian</p>
                    <button onclick="openTeacherModal(2, 'Andi', 'S1. Sistem Informasi Universitas Gadjah Mada 2019<br>S2. Cyber Security ITB 2022', 'Security Expert')" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Lihat
                    </button>
                </div>
            </div>

            <!-- Teacher 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-orange-100 border border-orange-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <span class="text-sm font-bold text-orange-700">id : 01</span>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Dedi</h4>
                    <p class="text-gray-500 text-sm mb-4">bidang keahlian</p>
                    <button onclick="openTeacherModal(3, 'Dedi', 'S1. Teknik Komputer Universitas Indonesia 2017<br>S2. Mobile Development Binus 2020', 'Mobile Developer')" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Lihat
                    </button>
                </div>
            </div>

            <!-- Teacher 4 -->
            <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-6">
                    <div class="bg-green-100 border border-green-200 px-3 py-2 rounded-xl flex items-center gap-2">
                        <span class="text-sm font-bold text-green-700">id : 04</span>
                    </div>
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-16 h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
                            <i class="ph ph-user text-gray-400 text-2xl"></i>
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center">
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-1">Imam</h4>
                    <p class="text-gray-500 text-sm mb-4">Network Engineer</p>
                    <button onclick="openTeacherModal(4, 'Imam', 'S1. Teknik Telekomunikasi Universitas Telkom 2016<br>S2. Network Engineering Universitas Indonesia 2019', 'Network Engineer')" 
                            class="bg-blue-600 text-white px-6 py-2 rounded-xl text-sm font-medium hover:bg-blue-700 transition-colors w-full">
                        Lihat
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Teacher Modal -->
<div id="teacherModal" class="fixed inset-0 z-50 hidden modal-backdrop flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full modal-enter">
      
        <div class="bg-blue-50 px-6 py-4 rounded-t-xl flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                Profile Pengajar
            </h3>
            <div class="flex items-center gap-4">
                
                <div class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-bold">
                    CodeVerse
                </div>
                <button onclick="closeTeacherModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="ph ph-x text-xl"></i>
                </button>
            </div>
        </div>
        
        <div class="p-6">
            <div class="flex gap-6">
              
                <div class="w-32 h-40 bg-blue-500 rounded-lg flex items-center justify-center flex-shrink-0">
                    <div class="text-center text-white">
                        <div class="w-16 h-16 bg-white bg-opacity-30 rounded-full mx-auto mb-3 flex items-center justify-center">
                            <i class="ph ph-user text-blue-500 text-3xl"></i>
                        </div>
                        <div class="text-sm font-medium">FOTO</div>
                        <div class="text-xs">TERSEDIA</div>
                    </div>
                </div>
                
               
                <div class="flex-1">
                    <table class="w-full text-sm">
                        <tr class="border-b border-gray-200">
                            <td class="py-2 pr-4 font-semibold text-gray-600 w-1/3">NIP/NIDN</td>
                            <td class="py-2" id="teacherId">071204870</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-2 pr-4 font-semibold text-gray-600">Nama</td>
                            <td class="py-2 font-bold text-gray-900" id="teacherName">- Nama Pengajar</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-2 pr-4 font-semibold text-gray-600">Jabatan Akademik</td>
                            <td class="py-2" id="teacherPosition">Lektor</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="py-2 pr-4 font-semibold text-gray-600 align-top">Pendidikan</td>
                            <td class="py-2 text-xs leading-relaxed" id="teacherEducation">
                                S1. Fisika Universitas Jember 2010<br>
                                S2. Ilmu Fisika Universitas Negeri Sebelas Maret 2014
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 pr-4 font-semibold text-gray-600">Bidang Keahlian</td>
                            <td class="py-2 font-medium" id="teacherSkill">Physics</td>
                        </tr>
                    </table>
                </div> 
            </div>
        </div>
        
        <!-- Footer -->
        <div class="px-6 py-4 bg-gray-50 rounded-b-xl flex justify-end">
            <button onclick="closeTeacherModal()" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                Close
            </button>
        </div>
    </div>
</div>

<script>
    function openTeacherModal(id, name, education, skill, position = 'Lektor') {
        document.getElementById('teacherId').textContent = String(id).padStart(9, '0');
        document.getElementById('teacherName').textContent = '- ' + name;
        document.getElementById('teacherPosition').textContent = position;
        document.getElementById('teacherEducation').innerHTML = education;
        document.getElementById('teacherSkill').textContent = skill;
        document.getElementById('teacherModal').classList.remove('hidden');
        document.body.classList.add('modal-open');
        document.body.style.overflow = 'hidden';
    }
    
    function closeTeacherModal() {
        document.getElementById('teacherModal').classList.add('hidden');
        document.body.classList.remove('modal-open');
        document.body.style.overflow = 'auto';
    }

    document.getElementById('teacherModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeTeacherModal();
        }
    });
</script>
@endsection