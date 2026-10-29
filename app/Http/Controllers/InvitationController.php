<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    /**
     * Display the specified invitation demo.
     */
    public function show(Request $request, string $slug): View
    {
        $invitation = Invitation::with([
            'theme',
            'wishes' => fn ($query) => $query->latest(),
        ])->where('slug', $slug)->firstOrFail();

        $guestName = $request->query('to');
        $wishes = $invitation->wishes;
        $wishesList = $wishes->map(fn ($w) => [
            'id' => $w->id,
            'guest_name' => $w->guest_name,
            'attendance' => $w->attendance,
            'message' => $w->message,
            'time_ago' => $w->created_at->diffForHumans(),
        ]);

        if ($invitation->slug === 'modern-minimalist' || ($invitation->theme && str_contains($invitation->theme->slug, 'minimalist'))) {
            return view('demo.modern-minimalist', compact('invitation', 'guestName', 'wishes', 'wishesList'));
        }

        if ($invitation->slug === 'summer-rustic' || ($invitation->theme && str_contains($invitation->theme->slug, 'rustic'))) {
            return view('demo.summer-rustic', compact('invitation', 'guestName', 'wishes', 'wishesList'));
        }

        return view('demo.show', compact('invitation', 'guestName', 'wishes', 'wishesList'));
    }

    /**
     * Store a new wish for the specified invitation.
     */
    public function storeWish(Request $request, string $slug): JsonResponse|RedirectResponse
    {
        // Bot honeypot protection
        if (! empty($request->input('website_hp'))) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Terima kasih atas ucapan dan doa restunya!',
                    'wish' => [
                        'id' => 0,
                        'guest_name' => 'Tamu',
                        'attendance' => 'hadir',
                        'message' => '',
                        'created_at_human' => 'Baru saja',
                    ],
                ]);
            }

            return back()->with('success', 'Terima kasih atas ucapan dan doa restunya!');
        }

        $invitation = Invitation::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'guest_name' => ['required', 'string', 'max:255'],
            'attendance' => ['required', 'string', 'in:hadir,tidak_hadir,ragu'],
            'message' => ['required', 'string', 'max:1000'],
        ]);

        $validated['guest_name'] = strip_tags(trim($validated['guest_name']));
        $validated['message'] = strip_tags(trim($validated['message']));

        $wish = $invitation->wishes()->create($validated);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Terima kasih atas ucapan dan doa restunya!',
                'wish' => [
                    'id' => $wish->id,
                    'guest_name' => $wish->guest_name,
                    'attendance' => $wish->attendance,
                    'message' => $wish->message,
                    'created_at_human' => $wish->created_at->diffForHumans(),
                ],
            ]);
        }

        return back()->with('success', 'Terima kasih atas ucapan dan doa restunya!');
    }
}
