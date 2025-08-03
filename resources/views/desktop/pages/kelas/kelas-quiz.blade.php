@extends('desktop.layout.master-desktop')

@section('title', 'Quiz - React JS Fundamental')

@section('page-title', 'Quiz Pembelajaran')
@section('hideSidebar', true)
@section('hideBottomNavbar', true)
@section('content')
    <!-- Quiz Header -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-30">
        <div class="max-w-4xl mx-auto px-6 py-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-4">
                    <button onclick="showExitConfirm()" class="text-gray-600 hover:text-red-500 transition-colors">
                        <i class="ph ph-x text-xl"></i>
                    </button>
                    <div>
                        <h1 class="font-bold text-lg text-gray-800">Quiz: React JS Basics</h1>
                        <p class="text-sm text-gray-600">Week 1: Introduction to React</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Timer -->
                    <div class="flex items-center gap-2 text-gray-600">
                        <i class="ph ph-timer text-lg"></i>
                        <span id="timer" class="font-mono font-semibold">15:00</span>
                    </div>
                    <!-- Progress -->
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-600">Soal <span id="currentQuestion">1</span> dari 10</span>
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div id="progressBar" class="bg-gradient-to-r from-p2 to-p3 h-2 rounded-full transition-all duration-300" style="width: 10%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-6 py-8">
        <!-- Quiz Container -->
        <div class="bg-white rounded-xl shadow2 p-8 mb-6">
            <!-- Question Number Indicators -->
            <div class="flex justify-center items-center gap-2 mb-8">
                <div class="flex items-center gap-1">
                    <div class="w-8 h-8 rounded-full bg-p2 text-white flex items-center justify-center text-sm font-semibold">1</div>
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center text-sm font-semibold">2</div>
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center text-sm font-semibold">3</div>
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center text-sm font-semibold">4</div>
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center text-sm font-semibold">5</div>
                    <span class="text-gray-400 mx-2">...</span>
                    <div class="w-8 h-8 rounded-full bg-gray-200 text-gray-600 flex items-center justify-center text-sm font-semibold">10</div>
                </div>
            </div>

            <!-- Question Content -->
            <div class="mb-8">
                <div class="flex items-start gap-3 mb-6">
                    <div class="bg-p2/10 text-p2 rounded-full px-3 py-1 text-sm font-semibold flex-shrink-0">
                        Soal 1
                    </div>
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold text-gray-800 mb-4 leading-relaxed">
                            Apa yang dimaksud dengan JSX dalam React?
                        </h2>
                        <p class="text-gray-600 text-sm mb-4">
                            Pilih satu jawaban yang paling tepat:
                        </p>
                    </div>
                </div>

                <!-- Answer Options -->
                <div class="space-y-3">
                    <label class="flex items-start gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-p2/50 hover:bg-p2/5 transition-all">
                        <input type="radio" name="question1" value="a" class="mt-1 text-p2 focus:ring-p2">
                        <div class="flex-1">
                            <div class="font-medium text-gray-800 mb-1">A. JavaScript XML</div>
                            <div class="text-sm text-gray-600">Sebuah ekstensi sintaks untuk JavaScript yang memungkinkan penulisan markup seperti HTML di dalam kode JavaScript</div>
                        </div>
                    </label>

                    <label class="flex items-start gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-p2/50 hover:bg-p2/5 transition-all">
                        <input type="radio" name="question1" value="b" class="mt-1 text-p2 focus:ring-p2">
                        <div class="flex-1">
                            <div class="font-medium text-gray-800 mb-1">B. Java Server Extensions</div>
                            <div class="text-sm text-gray-600">Sebuah teknologi server-side untuk menjalankan aplikasi Java di web browser</div>
                        </div>
                    </label>

                    <label class="flex items-start gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-p2/50 hover:bg-p2/5 transition-all">
                        <input type="radio" name="question1" value="c" class="mt-1 text-p2 focus:ring-p2">
                        <div class="flex-1">
                            <div class="font-medium text-gray-800 mb-1">C. JavaScript eXtended</div>
                            <div class="text-sm text-gray-600">Sebuah versi lanjutan dari JavaScript dengan fitur-fitur tambahan untuk development</div>
                        </div>
                    </label>

                    <label class="flex items-start gap-4 p-4 border-2 border-gray-200 rounded-xl cursor-pointer hover:border-p2/50 hover:bg-p2/5 transition-all">
                        <input type="radio" name="question1" value="d" class="mt-1 text-p2 focus:ring-p2">
                        <div class="flex-1">
                            <div class="font-medium text-gray-800 mb-1">D. JSON Syntax Extension</div>
                            <div class="text-sm text-gray-600">Sebuah ekstensi untuk format JSON yang mendukung sintaks yang lebih kompleks</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <button id="prevBtn" class="flex items-center gap-2 text-gray-600 hover:text-p2 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                    <i class="ph ph-arrow-left"></i>
                    <span>Sebelumnya</span>
                </button>
                
                <div class="flex items-center gap-3">
                    <button class="border-2 border-gray-300 text-gray-600 px-6 py-2 rounded-full font-semibold hover:border-gray-400 transition-all">
                        <i class="ph ph-bookmark mr-2"></i>
                        Tandai
                    </button>
                    <button id="nextBtn" class="bg-gradient-to-r from-p2 to-p3 text-white px-6 py-2 rounded-full font-semibold hover:opacity-90 transition-all">
                        <span>Selanjutnya</span>
                        <i class="ph ph-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Quick Navigation -->
        <div class="bg-white rounded-xl shadow2 p-6">
            <h3 class="font-semibold text-gray-800 mb-4">Navigasi Cepat</h3>
            <div class="grid grid-cols-10 gap-2">
                <button class="w-10 h-10 rounded-lg bg-p2 text-white font-semibold text-sm">1</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">2</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">3</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">4</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">5</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">6</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">7</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">8</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">9</button>
                <button class="w-10 h-10 rounded-lg bg-gray-200 text-gray-600 font-semibold text-sm hover:bg-gray-300">10</button>
            </div>
            <div class="flex items-center gap-4 mt-4 text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-p2"></div>
                    <span class="text-gray-600">Sedang dikerjakan</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-green-500"></div>
                    <span class="text-gray-600">Selesai</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-yellow-500"></div>
                    <span class="text-gray-600">Ditandai</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 rounded bg-gray-200"></div>
                    <span class="text-gray-600">Belum dikerjakan</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Exit Confirmation Modal -->
    <div id="exitModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-xl p-6 max-w-md mx-4">
            <div class="text-center">
                <div class="bg-red-100 text-red-600 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="ph ph-warning text-2xl"></i>
                </div>
                <h3 class="font-bold text-lg text-gray-800 mb-2">Keluar dari Quiz?</h3>
                <p class="text-gray-600 mb-6">
                    Progress quiz Anda akan hilang dan tidak dapat dikembalikan. Apakah Anda yakin ingin keluar?
                </p>
                <div class="flex gap-3">
                    <button onclick="hideExitConfirm()" class="flex-1 border border-gray-300 text-gray-600 py-2 rounded-lg font-semibold hover:bg-gray-50">
                        Batal
                    </button>
                    <button onclick="exitQuiz()" class="flex-1 bg-red-500 text-white py-2 rounded-lg font-semibold hover:bg-red-600">
                        Ya, Keluar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Quiz Complete Modal -->
    <div id="completeModal" class="fixed inset-0 bg-black/50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-xl p-8 max-w-lg mx-4">
            <div class="text-center">
                <div class="bg-green-100 text-green-600 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                    <i class="ph ph-check text-3xl"></i>
                </div>
                <h3 class="font-bold text-2xl text-gray-800 mb-2">Quiz Selesai!</h3>
                <p class="text-gray-600 mb-6">
                    Selamat! Anda telah menyelesaikan quiz dengan skor:
                </p>
                <div class="bg-gradient-to-r from-p2 to-p3 text-white rounded-lg p-6 mb-6">
                    <div class="text-4xl font-bold mb-2">85/100</div>
                    <div class="text-lg">8 dari 10 jawaban benar</div>
                </div>
                <div class="flex gap-3">
                    <button class="flex-1 border border-p2 text-p2 py-3 rounded-lg font-semibold hover:bg-p2/10">
                        Lihat Pembahasan
                    </button>
                    <button class="flex-1 bg-gradient-to-r from-p2 to-p3 text-white py-3 rounded-lg font-semibold hover:opacity-90">
                        Lanjut ke Materi
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('assets/js/custom/kelas-quiz.js') }}"></script>

<style>
/* Custom radio button styling */
input[type="radio"] {
    width: 18px;
    height: 18px;
    accent-color: #3b82f6; /* p2 color */
}

/* Smooth transitions for answer options */
label {
    transition: all 0.2s ease;
}

label:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Timer warning states */
#timer.text-yellow-600 {
    animation: pulse-yellow 2s infinite;
}

#timer.text-red-600 {
    animation: pulse-red 1s infinite;
}

@keyframes pulse-yellow {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

@keyframes pulse-red {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.6; }
}

/* Modal animations */
#exitModal, #completeModal {
    animation: fadeIn 0.3s ease;
}

#exitModal > div, #completeModal > div {
    animation: slideUp 0.3s ease;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from { 
        opacity: 0;
        transform: translateY(20px);
    }
    to { 
        opacity: 1;
        transform: translateY(0);
    }
}

/* Question indicator animation */
.grid button {
    transition: all 0.2s ease;
}

.grid button:hover {
    transform: scale(1.1);
}

/* Progress bar animation */
#progressBar {
    transition: width 0.5s ease;
}

/* Disabled button styling */
button:disabled {
    cursor: not-allowed;
    opacity: 0.5;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .max-w-4xl {
        max-width: 100%;
    }
    
    .px-6 {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .grid-cols-10 {
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 0.5rem;
    }
    
    .flex.items-center.justify-between {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .flex.items-center.gap-4 {
        justify-content: center;
    }
}

/* Print styles (for review mode) */
@media print {
    .sticky, .fixed, button {
        display: none !important;
    }
    
    .bg-white {
        background: white !important;
    }
    
    .shadow2 {
        box-shadow: none !important;
        border: 1px solid #e5e7eb;
    }
}
</style>
@endsection