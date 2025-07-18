<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('assets/images/logo.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <title>Sign Up - Quizio</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body class="">
<div class="container min-h-dvh relative overflow-hidden py-8 px-6 dark:text-white dark:bg-color1">
    <img src="{{ asset('assets/images/header-bg-2.png') }}" alt="" class="absolute top-0 left-0 right-0 -mt-6" />
    
    <!-- Page Title -->
    <div class="flex justify-start items-center gap-4 relative z-10">
        <a href="/" class="bg-white p-2 rounded-full flex justify-center items-center text-xl dark:bg-color10">
            <i class="ph ph-caret-left"></i>
        </a>
        <h2 class="text-2xl font-semibold text-white">Sign Up</h2>
    </div>
    <!-- Alert Message Start -->
@if(session('success'))
    <div class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 p-4 rounded bg-red-100 text-red-800 border border-red-300">
        <ul class="list-disc pl-4">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Alert Message End -->

    <!-- Form -->
    <form action="{{ route('register') }}" method="POST" class="relative z-20 mt-10">
        @csrf
        <div class="bg-white py-8 px-6 rounded-xl dark:bg-color10">
            <div class="pt-2">
                <label class="text-sm font-semibold pb-2 block">First Name</label>
                <input type="text" name="first_name" placeholder="Enter Name" class="w-full border border-color21 rounded-xl px-4 py-3 dark:text-color18 dark:border-color18" required>
            </div>

            <div class="pt-4">
                <label class="text-sm font-semibold pb-2 block">Email</label>
                <input type="email" name="email" placeholder="Enter Email" class="w-full border border-color21 rounded-xl px-4 py-3 dark:text-color18 dark:border-color18" required>
            </div>

            <div class="pt-4">
                <label class="text-sm font-semibold pb-2 block">Password</label>
                <input type="password" name="password" placeholder="*****" class="w-full border border-color21 rounded-xl px-4 py-3 dark:text-color18 dark:border-color18" required>
            </div>

            <div class="pt-4">
                <label class="text-sm font-semibold pb-2 block">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="*****" class="w-full border border-color21 rounded-xl px-4 py-3 dark:text-color18 dark:border-color18" required>
            </div>

            <div class="pt-4">
                <label class="text-sm font-semibold pb-2 block">Gender</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="male" checked>
                        <span>Male</span>
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="radio" name="gender" value="female">
                        <span>Female</span>
                    </label>
                </div>
            </div>

            <div class="pt-4">
                <label class="text-sm font-semibold pb-2 block">Role</label>
                <select name="role" class="w-full border border-color21 rounded-xl px-4 py-3 dark:text-color18 dark:border-color18" required>
                    <option value="siswa">Siswa</option>
                    <option value="pengajar">Pengajar</option>
                   
                </select>
            </div>

            <div class="pt-4">
                <label class="flex items-center gap-2 text-sm cursor-pointer">
                    <input type="checkbox" name="terms" required>
                    <span>I accept all Terms, Privacy and Fees</span>
                </label>
            </div>
        </div>

        <button type="submit" class="bg-p2 rounded-full py-3 text-white text-sm font-semibold text-center block mt-12 dark:bg-p1 w-full">
            Sign Up
        </button>
    </form>

    <div class="relative z-10">
        <p class="text-sm font-semibold text-center pt-5">
            Already have an account?
            <a href="{{ url('sign-in') }}" class="text-p2 dark:text-p1">Sign In</a> here
        </p>
    </div>
</div>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script defer src="{{ asset('index.js') }}"></script>
</body>
</html>
