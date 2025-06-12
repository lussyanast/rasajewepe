<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Gallery;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;


class PublicController extends Controller
{
    public function home()
    {
        $testimonials = Testimonial::with('user')
            ->where('approved', true)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('public.home', compact('testimonials'));
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
            'event_date' => 'required|date',
            'menu_id' => 'required|exists:catering_menu,menu_id',
            'quantity' => 'required|integer|min:1',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($request->menu_id);
        $total = $menu->price * $request->quantity;

        $order = Order::create([
            'user_id' => Auth::user()->user_id,
            'event_date' => $request->event_date,
            'address' => $request->address,
            'total_price' => $total,
            'order_status_id' => 1,
            'payment_status_id' => 1,
            'payment_method_id' => null,
            'notes' => $request->notes,
        ]);

        OrderItem::create([
            'order_id' => $order->order_id,
            'menu_id' => $menu->menu_id,
            'quantity' => $request->quantity,
            'subtotal' => $total,
        ]);

        return redirect('/')->with('success', 'Pemesanan berhasil dikirim!');
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
        if (!auth()->check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu untuk mengirim testimoni.');
        }

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Testimonial::create([
            'user_id' => auth()->user()->user_id,
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
