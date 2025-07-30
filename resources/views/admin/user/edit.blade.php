<form action="{{ route('admin.users.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-4">
        <label for="first_name">Nama:</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
    </div>
    
    <div class="mb-4">
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="pengajar" {{ $user->role == 'pengajar' ? 'selected' : '' }}>Pengajar</option>
            <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
        </select>
    </div>
    
    <div class="mb-4">
        <label for="password">Password Baru (kosongkan jika tidak ingin mengubah):</label>
        <input type="password" name="password" id="password">
    </div>
    
    <div class="mb-4">
        <label for="password_confirmation">Konfirmasi Password:</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>
    
    <button type="submit">Update User</button>
</form>