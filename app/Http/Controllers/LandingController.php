<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Testimonial;
use App\Models\Theme;
use App\Models\Wish;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    /**
     * Display a listing of themes, client testimonials, and statistics.
     */
    public function index(): View
    {
        $themes = Theme::with('invitations')->get();
        $testimonials = Testimonial::latest()->get();

        $totalTestimonials = Testimonial::count();
        $totalCreated = number_format(50 + Invitation::count(), 0, ',', '.');
        $totalShared = number_format(1250 + (Wish::count() * 15), 0, ',', '.');

        return view('landing', compact('themes', 'testimonials', 'totalTestimonials', 'totalCreated', 'totalShared'));
    }

    /**
     * Store a new client testimonial.
     */
    public function storeTestimonial(Request $request): RedirectResponse
    {
        // Bot honeypot protection
        if (! empty($request->input('website_hp'))) {
            return back()->with('success', 'Terima kasih atas testimoni dan ulasan bahagianya!');
        }

        $validated = $request->validate([
            'couple_name' => ['required', 'string', 'max:100'],
            'review' => ['required', 'string', 'max:500'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ]);

        $validated['couple_name'] = strip_tags(trim($validated['couple_name']));
        $validated['review'] = strip_tags(trim($validated['review']));

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('testimonials', 'public');
            $photoUrl = '/storage/'.$path;
        } else {
            $photoUrl = 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=600&q=80';
        }

        Testimonial::create([
            'couple_name' => $validated['couple_name'],
            'photo_url' => $photoUrl,
            'review' => $validated['review'],
            'rating' => (int) $validated['rating'],
        ]);

        return back()->with('success', 'Terima kasih atas testimoni dan ulasan bahagianya!');
    }
}
