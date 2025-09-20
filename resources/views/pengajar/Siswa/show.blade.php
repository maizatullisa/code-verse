@extends('pengajar.layouts.navbar-pengajar')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-4 md:p-8">

  <!-- Header -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 mb-8 shadow-xl shadow-black/5">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
      <div class="flex items-center gap-6"> 
        <button onclick="history.back()" class="flex items-center justify-center w-10 h-10 bg-blue-500 hover:bg-blue-600 text-white rounded-full transition-all duration-300">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
        </button>
        <div>
          <h1 class="text-2xl md:text-4xl font-bold text-gray-900 mb-2">
            Siswa - {{ $kelas->nama_kelas }}
          </h1>
          <p class="text-gray-600 text-base md:text-lg">Daftar siswa dalam kelas ini</p>
        </div>
      </div>

      <!-- Search -->
      <form method="GET" class="relative w-full sm:w-80">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
          </svg>
        </div>
        <input type="text" 
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari siswa..." 
            class="w-full pl-10 pr-4 py-3 bg-white/70 backdrop-blur-sm border-2 border-blue-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
      </form>
    </div>
  </div>

  <!-- Daftar siswa -->
  <div class="bg-white/80 backdrop-blur-xl border border-white/20 rounded-3xl p-6 md:p-8 shadow-xl shadow-black/5">
    <div class="mb-6">
      <h2 class="text-xl font-bold text-gray-900 mb-2">Daftar Siswa</h2>
      <p class="text-gray-600">Semua siswa yang terdaftar dalam kelas ini</p>
    </div>

    <div class="space-y-4">
    @foreach($siswa as $index => $item)
      @php $user = $item->user; @endphp
      <div class="flex items-center justify-between p-4 bg-white/60 backdrop-blur-sm rounded-2xl border border-white/30 hover:shadow-lg hover:shadow-black/5 transition-all duration-300">
        
        <!-- Bagian kiri: Avatar + Nama -->
        <div class="flex items-center gap-4">
          <!-- Nomor urut -->
          <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
            {{ ($siswa->currentPage() - 1) * $siswa->perPage() + $index + 1 }}
          </div>

          <!-- Foto / Inisial -->
          <div class="w-12 h-12 rounded-full flex items-center justify-center overflow-hidden font-semibold text-white">
            @if($user->profile_photo)
              <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="{{ $user->first_name }}" class="w-full h-full object-cover">
            @else
              <div class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                {{ strtoupper(substr($user->first_name, 0, 1)) }}{{ strtoupper(substr($user->last_name ?? '', 0, 1)) }}
              </div>
            @endif
          </div>

          <!-- Info siswa -->
          <div>
            <h3 class="font-semibold text-gray-900">{{ $user->first_name }} {{ $user->last_name }}</h3>
            <p class="text-sm text-gray-600">ID: {{ $user->id }}</p>
          </div>
        </div>

        <!-- Bagian kanan: Tombol lihat (POPUP) -->
        <button onclick="showStudentDetails({{ json_encode([
            'id' => $user->id,
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'gender' => $user->gender,
            'photo' => $user->profile_photo ? asset('storage/' . $user->profile_photo) : '',
            // 'classes' => $user->kelas ? $user->kelas->pluck('nama_kelas')->toArray() : []
        ]) }})"
          class="flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium transition cursor-pointer"
          type="button">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
          </svg>
          <span>Lihat</span>
        </button>
      </div>
    @endforeach
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-center mt-8 pt-6 border-t border-gray-200">
      {{ $siswa->links() }}
    </div>
  </div>
</div>

<!-- Modal Detail Siswa -->
<div id="studentModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50 flex items-center justify-center p-4">
  <!-- Modal Container -->
  <div class="bg-white/90 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl max-w-md w-full max-h-[90vh] overflow-y-auto">
    
    <!-- Modal Header -->
    <div class="flex items-center justify-between p-6 border-b border-gray-200">
      <h2 class="text-xl font-bold text-gray-900">Detail Siswa</h2>
      <button onclick="closeModal()" class="p-2 hover:bg-gray-100 rounded-full transition-all">
        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <!-- Modal Content -->
    <div class="p-6">
      
      <!-- Profile Photo Section -->
      <div class="flex justify-center mb-6">
        <div class="relative">
          <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-200 shadow-lg">
            <!-- Photo placeholder - replace with actual photo logic -->
            <img id="studentPhoto" src="" alt="Student Photo" class="w-full h-full object-cover hidden">
            <!-- Fallback avatar with initials -->
            <div id="studentAvatar" class="w-full h-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-bold text-2xl">
              AP
            </div>
          </div>
          <!-- Online status indicator -->
          <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-2 border-white rounded-full"></div>
        </div>
      </div>

      <!-- Student Information -->
      <div class="space-y-4">
        <div class="bg-gray-50 p-4 rounded-xl">
          <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-gray-600">Nama Lengkap</span>
          </div>
          <p id="studentName" class="text-lg font-semibold text-gray-900">-</p>
        </div>

        <div class="bg-gray-50 p-4 rounded-xl">
          <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-gray-600">Email</span>
          </div>
          <p id="studentEmail" class="text-gray-900">-</p>
        </div>

        <div class="bg-gray-50 p-4 rounded-xl">
          <div class="flex justify-between items-center mb-2">
            <span class="text-sm font-medium text-gray-600">Jenis Kelamin</span>
          </div>
          <p id="studentGender" class="text-gray-900">-</p>
        </div>

        <!-- <div class="bg-gray-50 p-4 rounded-xl">
          <div class="flex justify-between items-center mb-2"> -->
            <!-- <span class="text-sm font-medium text-gray-600">Kelas Diambil</span> -->
          <!-- </div> -->
          <!-- <div id="studentClasses" class="flex flex-wrap gap-2"> -->
            <!-- Classes will be populated here -->
          <!-- </div> -->
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="flex gap-3 mt-6">
        <button onclick="closeModal()" 
                class="flex-1 px-4 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors font-medium">
          Tutup
        </button>
      </div>
    </div>
  </div>
</div>

<script>
console.log('Script loaded'); // Debug log

function showStudentDetails(student) {
    console.log('showStudentDetails called with:', student); // Debug log
    
    try {
        const modal = document.getElementById("studentModal");
        const photo = document.getElementById("studentPhoto");
        const avatar = document.getElementById("studentAvatar");

        if (!modal) {
            console.error('Modal not found!');
            return;
        }

        // Handle photo/avatar display
        if (student.photo && student.photo !== '') {
            photo.src = student.photo;
            photo.classList.remove("hidden");
            avatar.classList.add("hidden");
        } else {
            photo.classList.add("hidden");
            avatar.classList.remove("hidden");
            const initials = student.name.split(" ").map(n => n[0]).join("").substring(0,2).toUpperCase();
            avatar.textContent = initials;
        }

        // Populate student information
        document.getElementById("studentName").textContent = student.name || '-';
        document.getElementById("studentEmail").textContent = student.email || '-';
        document.getElementById("studentGender").textContent = student.gender === "female" ? "Perempuan" : (student.gender === "male" ? "Laki-laki" : "-");
        
        // Handle classes
        // const classesContainer = document.getElementById("studentClasses");
        // classesContainer.innerHTML = "";
        
        // if (student.classes && student.classes.length > 0) {
        //     student.classes.forEach(className => {
        //         const span = document.createElement("span");
        //         span.className = "px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium";
        //         span.textContent = className;
        //         classesContainer.appendChild(span);
        //     });
        // } else {
        //     const span = document.createElement("span");
        //     span.className = "text-gray-500 italic";
        //     span.textContent = "Tidak ada kelas";
        //     classesContainer.appendChild(span);
        // }

        // Show modal
        modal.classList.remove("hidden");
        console.log('Modal should be visible now'); // Debug log
        
    } catch (error) {
        console.error('Error in showStudentDetails:', error);
    }
}

function closeModal() {
    console.log('closeModal called'); // Debug log
    const modal = document.getElementById("studentModal");
    if (modal) {
        modal.classList.add("hidden");
    }
}

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM ready'); // Debug log
    
    // Close modal when clicking outside
    const modal = document.getElementById("studentModal");
    if (modal) {
        modal.addEventListener("click", function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }

    // Close modal with Escape key
    document.addEventListener("keydown", function(e) {
        if (e.key === "Escape") {
            closeModal();
        }
    });
});
</script>

@endsection