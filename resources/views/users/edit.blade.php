<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Edit User Operator</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label>Nama</label>
            <input type="text" name="name" value="{{ $user->name }}" class="border w-full" required>
        </div>
        <div>
            <label>Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="border w-full" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="border w-full" required>
        </div>
        <div>
            <label>Password (opsional)</label>
            <input type="password" name="password" class="border w-full">
            <small>Biarkan kosong jika tidak ingin mengubah password</small>
        </div>
        <button type="submit" class="px-3 py-2 bg-yellow-500 text-white rounded">Update</button>
    </form>
</x-app-layout>
