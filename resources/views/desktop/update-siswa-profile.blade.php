@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Nama -->
    <div>
        <label for="first_name">Nama:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}">
        @error('first_name')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <!-- Foto Profil -->
    <div>
        <label for="profile_photo">Foto Profil:</label>
        <input type="file" name="profile_photo" id="profile_photo" accept="image/*">
        @error('profile_photo')
            <div class="text-red-500">{{ $message }}</div>
        @enderror
        @if($user->profile_photo)
            <div>
                <img src="{{ asset('storage/'.$user->profile_photo) }}" alt="Foto Profil" width="100">
            </div>
        @endif
    </div>

    <button type="submit">Update Profil</button>
</form>
