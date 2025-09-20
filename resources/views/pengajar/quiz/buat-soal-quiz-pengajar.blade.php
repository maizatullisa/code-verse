@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-screen bg-blue-800 py-8 px-4">
  <div class="max-w-5xl mx-auto">
    
    <!-- Quiz Info Header -->
    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-white/20 mb-8">
      <div class="flex items-center justify-between">
        <div>
          <h1 class="text-3xl font-bold text-white mb-2">{{ $quiz->judul ?? 'Judul Kuis' }}</h1>
          <p class="text-white/70">{{ $quiz->deskripsi ?? 'Deskripsi kuis' }}</p>
          <div class="flex items-center mt-3 space-x-4">
            <span class="bg-blue-500/20 text-blue-300 px-3 py-1 rounded-full text-sm">
              🎯 {{ $quiz->tipe_soal ?? 'Pilihan Ganda' }}
            </span>
            <span class="bg-green-500/20 text-green-300 px-3 py-1 rounded-full text-sm">
              📝 {{ $quiz->jumlah_soal ?? '10' }} Soal
            </span>
          </div>
        </div>
        <div class="text-right">
          <div class="bg-blue-500 rounded-2xl p-4 text-center">
            <div class="text-2xl font-bold text-white" id="soal-counter">1</div>
            <div class="text-white/80 text-sm">dari {{ $quiz->jumlah_soal ?? '10' }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Main Form Container -->
    <div class="bg-white/10 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/20 relative overflow-hidden">
      
      <!-- Decorative Elements -->
      <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-pink-400/20 to-purple-600/20 rounded-full blur-3xl"></div>
      <div class="absolute bottom-0 left-0 w-32 h-32 bg-gradient-to-tr from-blue-400/20 to-cyan-600/20 rounded-full blur-3xl"></div>
      
      <form action="#" method="POST" id="soal-form" class="relative z-10">
        @csrf
        <input type="hidden" name="quiz_id" value="{{ $quiz->id ?? '' }}">
        <input type="hidden" name="soal_ke" value="1" id="soal-ke-input">
        <input type="hidden" name="tipe_soal" value="pilihan_ganda" id="tipe-soal-input">

        <!-- Question Type Selector -->
        <div class="mb-8">
          <label class="block text-sm font-semibold text-white/90 mb-4">
            <span class="flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Tipe Soal
            </span>
          </label>
          
          <div class="flex space-x-4">
            @if($quiz->tipe_soal == 'pilihan_ganda')
                <button type="button" onclick="setTipeSoal('pilihan_ganda')"
                        class="tipe-btn active bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Pilihan Ganda
                </button>
            @endif
          </div>
        </div>

        <!-- Question Input -->
        <div class="mb-8">
          <label for="pertanyaan" class="block text-sm font-semibold text-white/90 mb-4">
            <span class="flex items-center">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg>
              Pertanyaan <span class="soal-number">1</span>
            </span>
          </label>
          <textarea name="pertanyaan" id="pertanyaan" rows="4" 
                    class="w-full px-6 py-4 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-white/50 focus:bg-white/20 focus:border-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400/50 transition-all duration-300 resize-none" 
                    placeholder="Tuliskan pertanyaan di sini..." required></textarea>
        </div>

        <!-- Multiple Choice Options -->
        <div id="pilihan-ganda-section" class="space-y-6">
          <h3 class="text-lg font-semibold text-white/90 mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
            </svg>
            Pilihan Jawaban
          </h3>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Option A -->
            <div class="group">
              <label class="flex items-center space-x-3 p-4 bg-white/5 rounded-2xl border border-white/20 hover:bg-white/10 transition-all duration-300 cursor-pointer">
                <input type="radio" name="jawaban_benar" value="A" class="w-5 h-5 text-blue-600" required>
                <span class="bg-blue-500/20 text-blue-300 w-8 h-8 rounded-full flex items-center justify-center font-bold">A</span>
                <input type="text" name="pilihan_a" placeholder="Opsi A" 
                       class="flex-1 bg-transparent text-white focus:outline-none placeholder-white/50" required>
              </label>
            </div>

            <!-- Option B -->
            <div class="group">
              <label class="flex items-center space-x-3 p-4 bg-white/5 rounded-2xl border border-white/20 hover:bg-white/10 transition-all duration-300 cursor-pointer">
                <input type="radio" name="jawaban_benar" value="B" class="w-5 h-5 text-green-600" required>
                <span class="bg-green-500/20 text-green-300 w-8 h-8 rounded-full flex items-center justify-center font-bold">B</span>
                <input type="text" name="pilihan_b" placeholder="Opsi B" 
                       class="flex-1 bg-transparent text-white focus:outline-none placeholder-white/50" required>
              </label>
            </div>

            <!-- Option C -->
            <div class="group">
              <label class="flex items-center space-x-3 p-4 bg-white/5 rounded-2xl border border-white/20 hover:bg-white/10 transition-all duration-300 cursor-pointer">
                <input type="radio" name="jawaban_benar" value="C" class="w-5 h-5 text-yellow-600" required>
                <span class="bg-yellow-500/20 text-yellow-300 w-8 h-8 rounded-full flex items-center justify-center font-bold">C</span>
                <input type="text" name="pilihan_c" placeholder="Opsi C" 
                       class="flex-1 bg-transparent text-white focus:outline-none placeholder-white/50" required>
              </label>
            </div>

            <!-- Option D -->
            <div class="group">
              <label class="flex items-center space-x-3 p-4 bg-white/5 rounded-2xl border border-white/20 hover:bg-white/10 transition-all duration-300 cursor-pointer">
                <input type="radio" name="jawaban_benar" value="D" class="w-5 h-5 text-purple-600" required>
                <span class="bg-purple-500/20 text-purple-300 w-8 h-8 rounded-full flex items-center justify-center font-bold">D</span>
                <input type="text" name="pilihan_d" placeholder="Opsi D" 
                       class="flex-1 bg-transparent text-white focus:outline-none placeholder-white/50" required>
              </label>
            </div>
          </div>
        </div>

        <!-- Question Navigation & Submit -->
        <div class="flex justify-between items-center pt-8 mt-8 border-t border-white/20">
          
          <!-- Previous Button -->
          <button type="button" id="prev-btn" onclick="prevSoal()" 
                  class="hidden group bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 border border-white/20 flex items-center">
            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Soal Sebelumnya
          </button>

          <!-- Question Progress -->
          <div class="flex-1 mx-8">
            <div class="bg-white/10 rounded-full h-3 overflow-hidden">
              <div class="bg-gradient-to-r from-blue-500 to-purple-600 h-full transition-all duration-500" 
                   style="width: 10%" id="progress-bar"></div>
            </div>
            <div class="text-center mt-2 text-white/70 text-sm">
              Progress: <span id="progress-text">1 dari {{ $quiz->jumlah_soal ?? '10' }}</span>
            </div>
          </div>

          <!-- Next/Submit Button -->
          <button type="button" id="next-btn" onclick="nextSoal()" 
                  class="group bg-blue-600 hover:from-blue-700  text-white px-6 py-3 rounded-xl font-semibold transition-all duration-300 flex items-center shadow-lg">
            <span id="next-text">Soal Selanjutnya</span>
            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
          </button>
        </div>

      </form>
    </div>

    <!-- Question Summary Sidebar -->
    <div class="mt-8 bg-white/10 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-white/20">
      <h3 class="text-lg font-semibold text-white/90 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
        </svg>
        Progress Soal
      </h3>
      <div class="grid grid-cols-5 gap-2" id="question-dots">
        <!-- Dots will be generated by JavaScript -->
      </div>
    </div>
  </div>
</div>

<script>
let currentSoal = 1;
const totalSoal = {{ $quiz->jumlah_soal ?? 10 }};
let soalData = {};

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing...');
    console.log('Total soal:', totalSoal);
    generateQuestionDots();
    updateAllDisplays();
    updateButtons();
    
    // Test apakah elemen ada
    console.log('✓ Soal counter element:', document.getElementById('soal-counter'));
    console.log('✓ Soal number span:', document.querySelector('.soal-number'));
    console.log('✓ Progress text:', document.getElementById('progress-text'));
    console.log('✓ Form element:', document.getElementById('soal-form'));
});

function setTipeSoal(tipe) {
    console.log('Setting tipe soal:', tipe);
    const clickedButton = event.target;
    
    document.querySelectorAll('.tipe-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-gradient-to-r', 'from-blue-600', 'to-blue-700');
        btn.classList.add('bg-white/10', 'border', 'border-white/20');
    });
    
    clickedButton.classList.add('active', 'bg-gradient-to-r', 'from-blue-600', 'to-blue-700');
    clickedButton.classList.remove('bg-white/10', 'border', 'border-white/20');
    
    document.getElementById('tipe-soal-input').value = tipe;
}

function clearAllFields() {
    console.log('=== CLEARING ALL FIELDS ===');
    
    // Clear pertanyaan textarea
    const pertanyaanElement = document.getElementById('pertanyaan');
    if (pertanyaanElement) {
        pertanyaanElement.value = '';
        console.log('✓ Pertanyaan cleared');
    }
    
    // Clear pilihan jawaban
    ['pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d'].forEach(name => {
        const element = document.querySelector(`input[name="${name}"]`);
        if (element) {
            element.value = '';
            console.log(`✓ ${name} cleared`);
        }
    });
    
    // Uncheck radio buttons
    document.querySelectorAll('input[name="jawaban_benar"]').forEach(radio => {
        radio.checked = false;
    });
    console.log('✓ Radio buttons cleared');
}

function loadDataToForm(data) {
    console.log('=== LOADING DATA TO FORM ===', data);
    
    // Load pertanyaan
    const pertanyaanElement = document.getElementById('pertanyaan');
    if (pertanyaanElement && data.pertanyaan) {
        pertanyaanElement.value = data.pertanyaan;
        console.log('✓ Pertanyaan loaded:', data.pertanyaan);
    }
    
    // Load pilihan jawaban
    ['pilihan_a', 'pilihan_b', 'pilihan_c', 'pilihan_d'].forEach(name => {
        const element = document.querySelector(`input[name="${name}"]`);
        if (element && data[name]) {
            element.value = data[name];
            console.log(`✓ ${name} loaded:`, data[name]);
        }
    });
    
    // Load jawaban benar
    if (data.jawaban_benar) {
        const radioElement = document.querySelector(`input[name="jawaban_benar"][value="${data.jawaban_benar}"]`);
        if (radioElement) {
            radioElement.checked = true;
            console.log('✓ Jawaban benar loaded:', data.jawaban_benar);
        }
    }
}

function updateAllDisplays() {
    console.log('=== UPDATING ALL DISPLAYS FOR SOAL:', currentSoal, '===');
    
    // 1. Update counter di header
    const soalCounterElement = document.getElementById('soal-counter');
    if (soalCounterElement) {
        soalCounterElement.textContent = currentSoal;
        console.log('✓ Soal counter updated to:', currentSoal);
    } else {
        console.error('✗ Soal counter element not found!');
    }
    
    // 2. Update text "Pertanyaan X"  
    const soalNumberElement = document.querySelector('.soal-number');
    if (soalNumberElement) {
        soalNumberElement.textContent = currentSoal;
        console.log('✓ Soal number text updated to:', currentSoal);
    } else {
        console.error('✗ Soal number element not found!');
    }
    
    // 3. Update progress text
    const progressTextElement = document.getElementById('progress-text');
    if (progressTextElement) {
        progressTextElement.textContent = `${currentSoal} dari ${totalSoal}`;
        console.log('✓ Progress text updated to:', `${currentSoal} dari ${totalSoal}`);
    } else {
        console.error('✗ Progress text element not found!');
    }
    
    // 4. Update progress bar
    const progressBarElement = document.getElementById('progress-bar');
    if (progressBarElement) {
        const progress = (currentSoal / totalSoal) * 100;
        progressBarElement.style.width = progress + '%';
        console.log('✓ Progress bar updated to:', progress + '%');
    } else {
        console.error('✗ Progress bar element not found!');
    }
    
    // 5. Update hidden input
    const soalKeInputElement = document.getElementById('soal-ke-input');
    if (soalKeInputElement) {
        soalKeInputElement.value = currentSoal;
        console.log('✓ Hidden input updated to:', currentSoal);
    } else {
        console.error('✗ Hidden input element not found!');
    }
    
    // 6. Update question dots
    updateQuestionDots();
}

function saveCurrentSoal() {
    console.log('=== SAVING CURRENT SOAL:', currentSoal, '===');
    
    const pertanyaan = document.getElementById('pertanyaan')?.value || '';
    const pilihanA = document.querySelector('input[name="pilihan_a"]')?.value || '';
    const pilihanB = document.querySelector('input[name="pilihan_b"]')?.value || '';
    const pilihanC = document.querySelector('input[name="pilihan_c"]')?.value || '';
    const pilihanD = document.querySelector('input[name="pilihan_d"]')?.value || '';
    
    const checkedRadio = document.querySelector('input[name="jawaban_benar"]:checked');
    const jawabanBenar = checkedRadio ? checkedRadio.value : '';
    
    soalData[currentSoal] = {
        pertanyaan: pertanyaan,
        tipe_soal: 'pilihan_ganda',
        pilihan_a: pilihanA,
        pilihan_b: pilihanB,
        pilihan_c: pilihanC,
        pilihan_d: pilihanD,
        jawaban_benar: jawabanBenar
    };
    
    console.log('✓ Data saved for soal', currentSoal, ':', soalData[currentSoal]);
}

function loadSoal(soalNumber) {
    console.log('=== LOADING SOAL:', soalNumber, '===');
    
    // Step 1: Clear fields
    clearAllFields();
    
    // Step 2: Update currentSoal
    currentSoal = soalNumber;
    
    // Step 3: Load data if exists
    if (soalData[soalNumber] && soalData[soalNumber].pertanyaan) {
        loadDataToForm(soalData[soalNumber]);
        console.log('✓ Loaded existing data');
    } else {
        console.log('✓ No existing data, fresh start');
    }
    
    // Step 4: Update displays
    updateAllDisplays();
}

function nextSoal() {
    console.log('=== NEXT SOAL CLICKED ===');
    console.log('Current soal before:', currentSoal, 'Total:', totalSoal);
    
    if (currentSoal < totalSoal) {
        // Save current
        saveCurrentSoal();
        
        // Move to next
        const nextNumber = currentSoal + 1;
        console.log('Moving to soal:', nextNumber);
        
        // Load next
        loadSoal(nextNumber);
        
        // Update buttons
        updateButtons();
        
        console.log('✓ Successfully moved to soal:', currentSoal);
    } else {
        console.log('Last soal, submitting...');
        submitAllSoal();
    }
}

function prevSoal() {
    console.log('=== PREV SOAL CLICKED ===');
    
    if (currentSoal > 1) {
        // Save current
        saveCurrentSoal();
        
        // Move to prev
        const prevNumber = currentSoal - 1;
        console.log('Moving to soal:', prevNumber);
        
        // Load prev
        loadSoal(prevNumber);
        
        // Update buttons
        updateButtons();
        
        console.log('✓ Successfully moved to soal:', currentSoal);
    }
}

function updateButtons() {
    const prevBtn = document.getElementById('prev-btn');
    const nextText = document.getElementById('next-text');
    
    if (prevBtn) {
        if (currentSoal === 1) {
            prevBtn.classList.add('hidden');
        } else {
            prevBtn.classList.remove('hidden');
        }
    }
    
    if (nextText) {
        if (currentSoal === totalSoal) {
            nextText.textContent = 'Selesai & Simpan';
        } else {
            nextText.textContent = 'Soal Selanjutnya';
        }
    }
}

function generateQuestionDots() {
    const container = document.getElementById('question-dots');
    if (!container) return;
    
    container.innerHTML = '';
    
    for (let i = 1; i <= totalSoal; i++) {
        const dot = document.createElement('div');
        dot.className = 'w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold cursor-pointer transition-all duration-300';
        dot.textContent = i;
        dot.onclick = () => jumpToSoal(i);
        container.appendChild(dot);
    }
}

function updateQuestionDots() {
    const dots = document.querySelectorAll('#question-dots > div');
    dots.forEach((dot, index) => {
        const soalNum = index + 1;
        dot.classList.remove('bg-blue-500', 'bg-green-500', 'bg-white/20', 'text-white', 'text-blue-300');
        
        if (soalNum === currentSoal) {
            dot.classList.add('bg-blue-500', 'text-white');
        } else if (soalData[soalNum] && soalData[soalNum].pertanyaan) {
            dot.classList.add('bg-green-500', 'text-white');
        } else {
            dot.classList.add('bg-white/20', 'text-blue-300');
        }
    });
}

function jumpToSoal(soalNumber) {
    console.log('=== JUMPING TO SOAL:', soalNumber, '===');
    saveCurrentSoal();
    loadSoal(soalNumber);
    updateButtons();
}

function submitAllSoal() {
    saveCurrentSoal();
    console.log('=== SUBMITTING ALL SOAL ===', soalData);
    
    const submitForm = document.createElement('form');
    submitForm.method = 'POST';
    submitForm.action = '/pengajar/quiz/question/store';
    
    // CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = document.querySelector('input[name="_token"]').value;
    submitForm.appendChild(csrfInput);
    
    // Quiz ID
    const quizIdInput = document.createElement('input');
    quizIdInput.type = 'hidden';
    quizIdInput.name = 'quiz_id';
    quizIdInput.value = '{{ $quiz->id ?? "" }}';
    submitForm.appendChild(quizIdInput);
    
    // Soal data
    const soalDataInput = document.createElement('input');
    soalDataInput.type = 'hidden';
    soalDataInput.name = 'soal_data';
    soalDataInput.value = JSON.stringify(soalData);
    submitForm.appendChild(soalDataInput);
    
    document.body.appendChild(submitForm);
    submitForm.submit();
}
</script>

<style>
/* Custom scrollbar */
textarea::-webkit-scrollbar {
    width: 8px;
}

textarea::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
}

textarea::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

textarea::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}

/* Radio button styling */
input[type="radio"] {
    appearance: none;
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    position: relative;
    background: rgba(255, 255, 255, 0.1);
}

input[type="radio"]:checked {
    border-color: #3b82f6;
    background: #3b82f6;
}

input[type="radio"]:checked::after {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* Active button styling */
.tipe-btn.active {
    background: linear-gradient(to right, #2563eb, #1d4ed8) !important;
    border: none !important;
}
</style>
@endsection