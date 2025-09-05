<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Edit Barang</h1>

    <form action="{{ route('items.update', $item) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $item->nama }}" class="border w-full">
        </div>
        <div>
            <label>Kode</label>
            <input type="text" name="kode" value="{{ $item->kode }}" class="border w-full">
        </div>
        <div>
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $item->stok }}" class="border w-full">
        </div>
        <div>
            <label>Lokasi Rak</label>
            <input type="text" name="lokasi_rak" value="{{ $item->lokasi_rak }}" class="border w-full">
        </div>
        <button type="submit" class="px-3 py-2 bg-blue-500 text-white rounded">Update</button>
    </form>
</x-app-layout>
