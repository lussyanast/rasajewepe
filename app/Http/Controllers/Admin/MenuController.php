<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\CategoryMenu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = CategoryMenu::all();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'catering_name' => 'required|string',
            'category_id' => 'required|exists:category_menu,category_id',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'portion' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'final_price' => 'required|integer',
            'is_active' => 'required|in:Y,N',
        ]);

        Menu::create($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Menu::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->update($request->all());
        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
