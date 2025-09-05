<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\Transaction;

Route::middleware('api')->group(function () {
    Route::post('/transactions-test', function (Request $request) {
        return DB::transaction(function () use ($request) {
            $item = Item::where('id', $request->id_barang)->lockForUpdate()->first();
            if (!$item) {
                return response()->json(['error' => 'Item not found'], 404);
            }

            if ($request->tipe_transaksi === 'masuk') {
                $item->stok += $request->jumlah;
            } else {
                $item->stok -= $request->jumlah;
            }
            $item->save();

            $trx = Transaction::create([
                'id_barang' => $item->id,
                'id_user' => 1, 
                'tipe_transaksi' => $request->tipe_transaksi,
                'jumlah' => $request->jumlah,
                'tanggal' => now(),
            ]);

            return response()->json($trx, 200);
        });
    });
});
