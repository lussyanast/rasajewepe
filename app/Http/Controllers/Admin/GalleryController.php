<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();
        return view('admin.galleries.index', compact('galleries'));
    }

    public function approve($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->approved = true;
        $gallery->save();

        return redirect()->route('galleries.index')->with('success', 'Gambar disetujui.');
    }

    public function destroy($id)
    {
        Gallery::destroy($id);
        return redirect()->route('galleries.index')->with('success', 'Gambar dihapus.');
    }
}
