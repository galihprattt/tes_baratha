<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Tambah Barang</h1>

    <form action="{{ route('items.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Nama</label>
            <input type="text" name="nama" class="border w-full">
        </div>
        <div>
            <label>Kode</label>
            <input type="text" name="kode" class="border w-full">
        </div>
        <div>
            <label>Stok</label>
            <input type="number" name="stok" class="border w-full">
        </div>
        <div>
            <label>Lokasi Rak</label>
            <input type="text" name="lokasi_rak" class="border w-full">
        </div>
        <button type="submit" class="px-3 py-2 bg-green-500 text-white rounded">Simpan</button>
    </form>
</x-app-layout>
