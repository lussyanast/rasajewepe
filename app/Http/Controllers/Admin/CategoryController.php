<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryMenu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryMenu::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:100',
            'is_active' => 'required|in:Y,N',
        ]);

        CategoryMenu::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $category = CategoryMenu::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:100',
            'is_active' => 'required|in:Y,N',
        ]);

        $category = CategoryMenu::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $category = CategoryMenu::findOrFail($id);
        $category->delete();

        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}