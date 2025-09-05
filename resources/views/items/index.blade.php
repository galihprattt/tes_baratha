<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Daftar Barang</h1>
    <a href="{{ route('items.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Tambah Barang</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Nama</th>
                <th class="border px-2 py-1">Kode</th>
                <th class="border px-2 py-1">Stok</th>
                <th class="border px-2 py-1">Lokasi Rak</th>
                <th class="border px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td class="border px-2 py-1">{{ $item->nama }}</td>
                <td class="border px-2 py-1">{{ $item->kode }}</td>
                <td class="border px-2 py-1 {{ $item->stok < 10 ? 'bg-red-200' : '' }}">
                    {{ $item->stok }}
                </td>
                <td class="border px-2 py-1">{{ $item->lokasi_rak }}</td>
                <td class="border px-2 py-1">
                    <a href="{{ route('items.edit', $item) }}" class="text-blue-500">Edit</a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
