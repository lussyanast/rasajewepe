<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function approve($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->approved = true;
        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni disetujui.');
    }

    public function destroy($id)
    {
        Testimonial::destroy($id);
        return redirect()->route('testimonials.index')->with('success', 'Testimoni dihapus.');
    }
}
