<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Tambah Transaksi</h1>

    <form action="{{ route('transactions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label>Barang</label>
            <select name="item_id" class="border w-full">
                @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->nama }} (stok: {{ $item->stok }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Tipe Transaksi</label>
            <select name="tipe_transaksi" class="border w-full">
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>
        <div>
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="border w-full" required>
        </div>
        <button type="submit" class="px-3 py-2 bg-green-500 text-white rounded">Simpan</button>
    </form>
</x-app-layout>
