<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    private function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',  // harus ada di tabel categories
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|gt:0',           // lebih besar dari nol
            'stock'       => 'required|integer|min:0',          // bilangan bulat >= 0
        ];
    }

    public function index()
    {
        $items = Item::with('category')->get();  // eager loading, hindari query N+1
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('items.form', compact('categories'));
    }

    public function store(Request $request)
    {
        Item::create($request->validate($this->rules()));
        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        $categories = Category::orderBy('name')->get();
        return view('items.form', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
        $item->update($request->validate($this->rules()));
        return redirect()->route('items.index')->with('success', 'Barang berhasil diubah.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}