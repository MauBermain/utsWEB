<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('items')->get();  // jumlah barang per kategori
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.form');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        Category::create($data);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Category $category)
    {
        return view('categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate(['name' => 'required|string|max:255']);
        $category->update($data);
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diubah.');
    }

    public function destroy(Category $category)
    {
        // Tolak penghapusan jika masih dipakai barang
        if ($category->items()->exists()) {
            return redirect()->route('categories.index')
                ->with('error', 'Kategori "'.$category->name.'" tidak bisa dihapus karena masih memiliki barang.');
        }

        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}