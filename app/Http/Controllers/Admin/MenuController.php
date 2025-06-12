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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'portion' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'final_price' => 'required|integer',
            'is_active' => 'required|in:Y,N',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = CategoryMenu::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        $request->validate([
            'catering_name' => 'required|string',
            'category_id' => 'required|exists:category_menu,category_id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'portion' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'nullable|integer',
            'final_price' => 'required|integer',
            'is_active' => 'required|in:Y,N',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Menu::destroy($id);
        return redirect()->route('menus.index')->with('success', 'Menu berhasil dihapus.');
    }
}
