<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:items',
            'stok' => 'required|integer|min:0',
            'lokasi_rak' => 'nullable|string|max:255',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:50|unique:items,kode,'.$item->id,
            'stok' => 'required|integer|min:0',
            'lokasi_rak' => 'nullable|string|max:255',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus');
    }
}
