<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Daftar User Operator</h1>
    <a href="{{ route('users.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Tambah Operator</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Nama</th>
                <th class="border px-2 py-1">Username</th>
                <th class="border px-2 py-1">Email</th>
                <th class="border px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="border px-2 py-1">{{ $user->name }}</td>
                <td class="border px-2 py-1">{{ $user->username }}</td>
                <td class="border px-2 py-1">{{ $user->email }}</td>
                <td class="border px-2 py-1">
                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
