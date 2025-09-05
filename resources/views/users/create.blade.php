<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Tambah User Operator</h1>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="name" class="border w-full" required>
        </div>
        <div>
            <label>Username</label>
            <input type="text" name="username" class="border w-full" required>
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" class="border w-full" required>
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" class="border w-full" required>
        </div>
        <div>
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="border w-full" required>
        </div>
        <button type="submit" class="px-3 py-2 bg-green-500 text-white rounded">Simpan</button>
    </form>
</x-app-layout>
