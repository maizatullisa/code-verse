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
            margin: 1rem;
        }
        #teacherModal .modal-content {
            flex-direction: column;
        }
        #teacherModal .teacher-photo {
            width: 100%;
            height: 120px;
            max-width: 120px;
            margin: 0 auto;
        }
        #teacherModal .teacher-info {
            margin-top: 1rem;
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

<div class="min-h-screen bg-gray-50 rounded-xl px-4 sm:px-6 lg:px-8">
    <!-- Header Section -->
    <div class="bg-white shadow-sm border-b rounded-xl">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-6 sm:py-8">
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900 text-center mb-2">Code Verse</h1>
            <p class="text-gray-600 text-center text-sm sm:text-base lg:text-lg">
                Platform Pembelajaran Online Untuk Para Coder
            </p>
        </div>
    </div>

    <!-- Coba jelajahi -->
    <div class="max-w-6xl mx-auto mb-12 sm:mb-16 mt-6 sm:mt-8">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-6 sm:mb-8 text-center">Coba Jelajahi</h2>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <a href="{{ url('/coding-tips') }}" class="flex flex-col items-center gap-3 sm:gap-4 quiz-category-item cursor-pointer group">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-emerald-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-lightbulb text-white text-2xl sm:text-3xl"></i>
                </div>
                <p class="text-xs sm:text-sm font-semibold text-gray-700 group-hover:text-emerald-600 transition-colors text-center">Coding Tips</p>
            </a>

            <a href="{{ url('/games/pilih-game') }}" class="flex flex-col items-center gap-3 sm:gap-4 quiz-category-item cursor-pointer group">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-orange-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-puzzle-piece text-white text-2xl sm:text-3xl"></i>
                </div>
                <p class="text-xs sm:text-sm font-semibold text-gray-700 group-hover:text-orange-600 transition-colors text-center">Games</p>
            </a>

            <a href="{{ url('/glossary') }}" class="flex flex-col items-center gap-3 sm:gap-4 quiz-category-item cursor-pointer group">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-book text-white text-2xl sm:text-3xl"></i>
                </div>
                <p class="text-xs sm:text-sm font-semibold text-gray-700 group-hover:text-blue-600 transition-colors text-center">Glossary</p>
            </a>

            <a href="{{ url('/keyboard-shortcuts') }}" class="flex flex-col items-center gap-3 sm:gap-4 quiz-category-item cursor-pointer group">
                <div class="w-16 h-16 sm:w-20 sm:h-20 bg-purple-500 rounded-2xl flex items-center justify-center shadow-lg group-hover:shadow-xl group-hover:-translate-y-1 transition-all duration-300">
                    <i class="ph ph-keyboard text-white text-2xl sm:text-3xl"></i>
                </div>
                <p class="text-xs sm:text-sm font-semibold text-gray-700 group-hover:text-purple-600 transition-colors text-center">Shortcuts</p>
            </a>
        </div>

        <!-- Decorative Element -->
        <div class="flex justify-center items-center mt-8 sm:mt-12">
            <div class="flex space-x-2">
                <div class="w-2 h-2 sm:w-3 sm:h-3 bg-blue-500 rounded-full"></div>
                <div class="w-2 h-2 sm:w-3 sm:h-3 bg-emerald-500 rounded-full"></div>
                <div class="w-2 h-2 sm:w-3 sm:h-3 bg-orange-500 rounded-full"></div>
                <div class="w-2 h-2 sm:w-3 sm:h-3 bg-purple-500 rounded-full"></div>
            </div>
        </div>
    </div>

    <!--  
    <div class="max-w-6xl mx-auto mb-12 sm:mb-16">
        <div class="bg-blue-600 rounded-2xl sm:rounded-3xl p-6 sm:p-8 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 sm:w-32 sm:h-32 bg-white bg-opacity-10 rounded-full -translate-y-12 sm:-translate-y-16 translate-x-12 sm:translate-x-16"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 sm:w-24 sm:h-24 bg-white bg-opacity-10 rounded-full translate-y-8 sm:translate-y-12 -translate-x-8 sm:-translate-x-12"></div>
            <div class="relative flex flex-col md:flex-row justify-between items-center gap-4 md:gap-0">
                <div class="text-white text-center md:text-left">
                    <p class="text-lg sm:text-xl mb-2 font-medium">nanti bisa dikasih apa yng kita mau</p>
                    <p class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-2">disini%</p>
                    <p class="text-lg sm:text-xl font-medium">dan disini</p>
                </div>
                <div class="block md:block">
                    <div class="w-32 h-24 sm:w-40 sm:h-32 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center">
                        <i class="ph ph-users text-white text-3xl sm:text-4xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Recommended Materials -->
    <div class="max-w-6xl mx-auto mb-12 sm:mb-16">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                <!-- Timer Header -->
                <div class="bg-blue-50 px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 sm:gap-0">
                        <div class="flex items-center gap-3 sm:gap-4">
                            <span class="text-gray-600 font-medium text-lg sm:text-xl lg:text-2xl">Rekomendasi kelas</span>
                        </div>
                        <a href="{{ url('/desktop/kelas-ditawarkan') }}" 
                           class="bg-blue-600 text-white px-4 sm:px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-sm sm:text-base">
                            Lihat Semua
                        </a>
                    </div>
                </div>

                <!-- Quiz Content -->
            </div>
        </div>
    </div>

    <!-- Best Teachers -->
    <div class="max-w-6xl mx-auto mb-16 sm:mb-20">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 sm:mb-8 gap-4 sm:gap-0">
            <div class="flex items-center gap-3">
                <i class="ph-fill ph-trophy text-xl sm:text-2xl text-blue-600"></i>
                <h3 class="text-xl sm:text-2xl font-semibold text-gray-800">Pengajar</h3>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-6">
            @foreach($teachers as $index => $teacher)
            <div class="bg-white p-4 sm:p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="flex justify-between items-center mb-4 sm:mb-6">
                    @if($index == 0)
                        <div class="bg-yellow-100 border border-yellow-200 px-2 sm:px-3 py-1 sm:py-2 rounded-xl flex items-center gap-2">
                            <i class="ph-fill ph-trophy text-yellow-600 text-sm sm:text-base"></i>
                            <span class="text-xs sm:text-sm font-bold text-yellow-800">id : {{ str_pad($teacher->user->id, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    @elseif($index == 1)
                        <div class="bg-gray-100 border border-gray-200 px-2 sm:px-3 py-1 sm:py-2 rounded-xl flex items-center gap-2">
                            <span class="text-xs sm:text-sm font-bold text-gray-700">id : {{ str_pad($teacher->user->id, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    @elseif($index == 2)
                        <div class="bg-orange-100 border border-orange-200 px-2 sm:px-3 py-1 sm:py-2 rounded-xl flex items-center gap-2">
                            <span class="text-xs sm:text-sm font-bold text-orange-700">id : {{ str_pad($teacher->user->id, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    @else
                        <div class="bg-green-100 border border-green-200 px-2 sm:px-3 py-1 sm:py-2 rounded-xl flex items-center gap-2">
                            <span class="text-xs sm:text-sm font-bold text-green-700">id : {{ str_pad($teacher->user->id, 2, '0', STR_PAD_LEFT) }}</span>
                        </div>
                    @endif
                </div>
                <div class="text-center">
                    <div class="relative inline-block mb-4">
                        <div class="w-14 h-14 sm:w-16 sm:h-16 bg-gray-200 rounded-full mx-auto flex items-center justify-center overflow-hidden">
                            @if($teacher->photo)
                               <img src="{{ asset($teacher->photo) }}" alt="Foto Pengajar" class="object-cover w-full h-full rounded-full">
                            @else
                                <i class="ph ph-user text-gray-400 text-xl sm:text-2xl"></i>
                            @endif
                        </div>
                        @if($index >= 3)
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 sm:w-6 sm:h-6 bg-green-500 rounded-full flex items-center justify-center">
                            </div>
                        @endif
                    </div>
                    <h4 class="font-bold text-base sm:text-lg mb-1">{{ $teacher->full_name }}</h4>
                    <p class="text-gray-500 text-xs sm:text-sm mb-3 sm:mb-4">{{ $teacher->expertise ?? 'bidang keahlian' }}</p>
                    <button 
                        class="bg-blue-600 text-white px-4 sm:px-6 py-2 rounded-xl text-xs sm:text-sm font-medium hover:bg-blue-700 transition-colors w-full"
                        data-id="{{ $teacher->user->id }}"
                        data-name="{{ $teacher->full_name }}"
                        data-education="{{ $teacher->last_education }}"
                        data-skill="{{ $teacher->expertise }}"
                        data-position="{{ $teacher->academic_position }}"
                        data-photo="{{ asset($teacher->photo) }}"
                        data-faculty="{{ $teacher->faculty ?? '-' }}"
                        data-prodi="{{ $teacher->study_program ?? '-' }}"
                        data-riwayat='@json($teacher->riwayatPendidikan ?? [])'
                        onclick="openTeacherModal(this)">
                        Lihat
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Teacher Modal -->
<div id="teacherModal" class="fixed inset-0 z-50 hidden modal-backdrop flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full modal-enter">
        <div class="bg-blue-50 px-4 sm:px-6 py-4 rounded-t-xl flex items-center justify-between">
            <h3 class="text-base sm:text-lg font-bold text-gray-800 flex items-center gap-2">Profile Pengajar</h3>
        </div>

        <div class="p-4 sm:p-6">
            <div class="modal-content flex flex-col sm:flex-row gap-4 sm:gap-6">
                <!-- Foto -->
                <div class="teacher-photo w-full sm:w-32 h-32 sm:h-40 bg-blue-500 rounded-lg flex items-center justify-center overflow-hidden flex-shrink-0 mx-auto sm:mx-0">
                    <img id="teacherPhoto" src="" alt="Foto Pengajar" class="object-cover w-full h-full rounded-lg" style="display: none;">
                    <div id="teacherPhotoPlaceholder" class="text-center text-white">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-white bg-opacity-30 rounded-full mx-auto mb-2 sm:mb-3 flex items-center justify-center">
                            <i class="ph ph-user text-blue-500 text-2xl sm:text-3xl"></i>
                        </div>
                        <div class="text-xs sm:text-sm font-medium">FOTO</div>
                        <div class="text-xs">TERSEDIA</div>
                    </div>
                </div>

                <!-- Biodata -->
                <div class="teacher-info flex-1">
                    <div class="overflow-x-auto">
                        <table class="w-full text-xs sm:text-sm">
                            <tr class="border-b border-gray-200">
                                <td class="py-2 pr-2 sm:pr-4 font-semibold text-gray-600 w-1/3">Nama</td>
                                <td class="py-2 font-bold text-gray-900" id="teacherName"></td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <td class="py-2 pr-2 sm:pr-4 font-semibold text-gray-600">Jabatan Akademik</td>
                                <td class="py-2" id="teacherPosition"></td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <td class="py-2 pr-2 sm:pr-4 font-semibold text-gray-600">Fakultas</td>
                                <td class="py-2" id="teacherFaculty"></td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <td class="py-2 pr-2 sm:pr-4 font-semibold text-gray-600">Program Studi</td>
                                <td class="py-2" id="teacherProdi"></td>
                            </tr>
                            <tr>
                                <td class="py-2 pr-2 sm:pr-4 font-semibold text-gray-600">Bidang Keahlian</td>
                                <td class="py-2 font-medium" id="teacherSkill"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-semibold text-gray-800 mb-2 text-sm sm:text-base">Riwayat Pendidikan</h4>
                        <ul class="list-disc pl-4 sm:pl-6 text-xs sm:text-sm text-gray-700 space-y-1" id="teacherRiwayat">
                            <!-- Akan diisi lewat JS -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 sm:px-6 py-4 bg-gray-50 rounded-b-xl flex justify-end">
            <button onclick="closeTeacherModal()" 
                    class="bg-blue-600 text-white px-4 sm:px-6 py-2 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                Close
            </button>
        </div>
    </div>
</div>

<script>
function openTeacherModal(button) {
    const data = button.dataset;

    document.getElementById('teacherName').textContent = '- ' + (data.name || '');
    document.getElementById('teacherPosition').textContent = data.position || '-';
    document.getElementById('teacherSkill').textContent = data.skill || '-';
    document.getElementById('teacherFaculty').textContent = data.faculty || '-';
    document.getElementById('teacherProdi').textContent = data.prodi || '-';

    // Foto
    let img = document.getElementById('teacherPhoto');
    let placeholder = document.getElementById('teacherPhotoPlaceholder');
    if (data.photo) {
        img.src = data.photo;
        img.style.display = 'block';
        placeholder.style.display = 'none';
    } else {
        img.style.display = 'none';
        placeholder.style.display = 'block';
    }

    // Riwayat Pendidikan
    let riwayatList = document.getElementById('teacherRiwayat');
    riwayatList.innerHTML = '';
    let riwayat = [];
    try { riwayat = JSON.parse(data.riwayat); } catch(e) {}
    if (riwayat.length > 0) {
        riwayat.forEach(r => {
            let li = document.createElement('li');
            li.textContent = `${r.jenjang} - ${r.jurusan} (${r.institusi}, ${r.tahun_lulus ?? '-'})`;
            riwayatList.appendChild(li);
        });
    } else {
        riwayatList.innerHTML = '<li>Belum ada data</li>';
    }

    document.getElementById('teacherModal').classList.remove('hidden');
    document.body.classList.add('modal-open');
}

function closeTeacherModal() {
    document.getElementById('teacherModal').classList.add('hidden');
    document.body.classList.remove('modal-open');
}

document.getElementById('teacherModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeTeacherModal();
    }
});
</script>
@endsection