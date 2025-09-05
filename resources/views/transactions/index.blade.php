<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Daftar Transaksi</h1>
    <a href="{{ route('transactions.create') }}" class="px-3 py-2 bg-blue-500 text-white rounded">Tambah Transaksi</a>

    <table class="table-auto w-full mt-4 border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Tanggal</th>
                <th class="border px-2 py-1">Barang</th>
                <th class="border px-2 py-1">User</th>
                <th class="border px-2 py-1">Tipe</th>
                <th class="border px-2 py-1">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $trx)
            <tr>
                <td class="border px-2 py-1">{{ $trx->tanggal }}</td>
                <td class="border px-2 py-1">{{ $trx->item->nama }}</td>
                <td class="border px-2 py-1">{{ $trx->user->name }}</td>
                <td class="border px-2 py-1 {{ $trx->tipe_transaksi === 'keluar' ? 'text-red-500' : 'text-green-500' }}">
                    {{ ucfirst($trx->tipe_transaksi) }}
                </td>
                <td class="border px-2 py-1">{{ $trx->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
