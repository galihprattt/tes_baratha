<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['item', 'user'])->latest()->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $items = Item::all();
        return view('transactions.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'tipe_transaksi' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {
            $item = Item::lockForUpdate()->find($request->item_id);

            if ($request->tipe_transaksi === 'keluar' && $item->stok < $request->jumlah) {
                throw new \Exception('Stok tidak mencukupi!');
            }

            
            if ($request->tipe_transaksi === 'masuk') {
                $item->stok += $request->jumlah;
            } else {
                $item->stok -= $request->jumlah;
            }
            $item->save();

            
            Transaction::create([
            'id_barang' => $item->id,
            'id_user' => auth()->id(),
            'tipe_transaksi' => $request->tipe_transaksi,
            'jumlah' => $request->jumlah,
            'tanggal' => now(),
        ]);

        });

        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil dicatat');
    }
}
