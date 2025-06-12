<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Contact;
use Illuminate\Http\Request;


class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function catalog()
    {
        $menus = Menu::all();
        return view('public.catalog', compact('menus'));
    }

    public function orderForm()
    {
        return view('public.order');
    }

    public function submitOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        Order::create($request->all());

        return redirect('/')->with('success', 'Pesanan berhasil dikirim!');
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        return view('public.gallery', compact('galleries'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('approved', true)->latest()->get();
        return view('public.testimonials', compact('testimonials'));
    }

    public function submitTestimonial(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'message' => 'required|string|max:1000',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'message' => $request->message,
            'approved' => false,
        ]);

        return redirect('/testimonials')->with('success', 'Testimoni berhasil dikirim dan akan ditampilkan setelah disetujui.');
    }

    public function contactForm()
    {
        return view('public.contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        // Format pesan untuk WhatsApp (dengan encoding dan line break)
        $waText = "Halo RasaJeWePe! Saya *$name* (email: $email) ingin menghubungi Anda:%0A%0A$message";
        $waLink = "https://wa.me/6285772492505?text=" . urlencode($waText);

        return redirect()->away($waLink);
    }
}
