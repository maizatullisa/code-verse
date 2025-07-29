
<div class="container min-h-dvh relative overflow-hidden py-8 dark:text-white dark:bg-color1">
    <!-- Absolute Effects -->
    <img src="{{ asset('assets/images/header-bg-1.png') }}" alt="" class="absolute top-0 left-0 right-0 -mt-16" />
    <div class="absolute top-0 left-0 bg-p3 blur-[145px] h-[174px] w-[149px]"></div>
    <div class="absolute top-40 right-0 bg-[#0ABAC9] blur-[150px] h-[174px] w-[91px]"></div>
    <div class="absolute top-80 right-40 bg-p2 blur-[235px] h-[205px] w-[176px]"></div>
    <div class="absolute bottom-0 right-0 bg-p3 blur-[220px] h-[174px] w-[149px]"></div>

    <!-- Header -->
    <div class="relative z-10">
        <div class="flex justify-between items-center gap-4 px-6">
            <div class="flex items-center gap-4">
                <a href="{{ url('/materi') }}" class="bg-white size-8 rounded-full flex justify-center items-center text-xl dark:bg-color10">
                    <i class="ph ph-caret-left"></i>
                </a>
                <h2 class="text-2xl font-semibold text-white">Materi Pengajar</h2>
            </div>
        </div>

     <!-- Nama Pengajar -->
<div class="pt-12 px-6">
    <h3 class="text-xl font-bold text-white">
        <i class="ph ph-user"></i> {{ $pengajar->name }}
    </h3>
</div>

<!-- Materi List -->
<div class="pt-6 px-6">
    @if ($pengajar->materis->count())
    <form action="{{ route('daftar-belajar.simpan') }}" method="POST">
        @csrf

        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
            @foreach ($pengajar->materis as $materi)
            <div class="bg-white shadow rounded-lg p-6 hover:shadow-md transition duration-200 relative">
                <!-- Checkbox -->
                <input type="checkbox" name="selected_materis[]" value="{{ $materi->id }}"
                    class="absolute top-4 right-4 w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">

                <div
                    class="p-6 bg-white dark:bg-color10 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex justify-between items-center">
                        <div class="flex gap-3 items-center">
                            <div class="py-2 px-3 text-white bg-p2 rounded-xl text-center shadow-sm">
                                <p class="font-semibold text-sm leading-none">
                                    {{ \Carbon\Carbon::parse($materi->created_at)->format('d M') }}
                                </p>
                                <p class="text-[11px] leading-tight">
                                    {{ \Carbon\Carbon::parse($materi->created_at)->format('H:i') }}
                                </p>
                            </div>

                            <div>
                                <p
                                    class="font-bold text-sm text-gray-800 dark:text-white tracking-wide">
                                    {{ $materi->judul }}
                                </p>
                                @if ($materi->deskripsi)
                                <p
                                    class="text-[13px] italic text-gray-600 dark:text-gray-300 truncate max-w-[200px]">
                                    {{ \Illuminate\Support\Str::limit($materi->deskripsi, 100) }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if ($errors->has('selected_materis'))
    <p class="text-red-500 text-sm mt-2">{{ $errors->first('selected_materis') }}</p>
@endif
        <!-- 🟦 Tombol Submit -->
        <div class="mt-6 text-center">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Tambahkan ke Daftar Belajar
            </button>
        </div>
    </form>
    @else
    <p class="text-gray-400 text-md italic">Belum ada materi yang dipublikasikan.</p>
    @endif
</div>

