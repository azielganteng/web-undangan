<?php

namespace Tests\Feature;

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LandingController;
use App\Models\Invitation;
use App\Models\Theme;
use App\Models\Wish;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class InvitationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $testViewsDir = storage_path('framework/testing/views');
        if (! is_dir($testViewsDir.'/demo')) {
            mkdir($testViewsDir.'/demo', 0777, true);
        }
        file_put_contents($testViewsDir.'/landing.blade.php', '');
        file_put_contents($testViewsDir.'/demo/show.blade.php', '');
        file_put_contents($testViewsDir.'/demo/summer-rustic.blade.php', '');
        file_put_contents($testViewsDir.'/demo/modern-minimalist.blade.php', '');

        View::addLocation($testViewsDir);
    }

    /**
     * Test themes, invitation, and wishes relations.
     */
    public function test_models_relationships(): void
    {
        $theme = Theme::factory()->create(['name' => 'Leafy Botanical']);
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);
        $wish = Wish::factory()->create([
            'invitation_id' => $invitation->id,
            'guest_name' => 'Rizky Pratama',
            'attendance' => 'hadir',
        ]);

        $this->assertTrue($theme->invitations->contains($invitation));
        $this->assertEquals($theme->id, $invitation->theme->id);
        $this->assertTrue($invitation->wishes->contains($wish));
        $this->assertEquals($invitation->id, $wish->invitation->id);
    }

    /**
     * Test LandingController returns themes with invitations in view data.
     */
    public function test_landing_controller_data(): void
    {
        $theme = Theme::factory()->create();
        Invitation::factory()->create(['theme_id' => $theme->id]);

        $controller = new LandingController;
        $view = $controller->index();

        $this->assertEquals('landing', $view->name());
        $this->assertArrayHasKey('themes', $view->getData());
        $this->assertArrayHasKey('testimonials', $view->getData());
        $this->assertArrayHasKey('totalTestimonials', $view->getData());
        $this->assertArrayHasKey('totalCreated', $view->getData());
        $this->assertArrayHasKey('totalShared', $view->getData());
        $this->assertTrue($view->getData()['themes']->first()->relationLoaded('invitations'));
    }

    /**
     * Test InvitationController show returns correct invitation, guestName, and wishes.
     */
    public function test_invitation_controller_show_data(): void
    {
        $theme = Theme::factory()->create();
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);
        Wish::factory()->count(3)->create(['invitation_id' => $invitation->id]);

        $request = Request::create('/demo/zian-sahri?to=Okta', 'GET');
        $controller = new InvitationController;
        $view = $controller->show($request, 'zian-sahri');

        $this->assertEquals('demo.show', $view->name());
        $this->assertEquals('Okta', $view->getData()['guestName']);
        $this->assertEquals($invitation->id, $view->getData()['invitation']->id);
        $this->assertCount(3, $view->getData()['wishes']);
    }

    /**
     * Test submitting a valid wish via POST route.
     */
    public function test_can_store_wish_for_invitation(): void
    {
        $theme = Theme::factory()->create();
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);

        $payload = [
            'guest_name' => 'Ahmad Fauzi',
            'attendance' => 'hadir',
            'message' => 'Selamat untuk kedua mempelai! Semoga sakinah mawaddah warahmah.',
        ];

        $response = $this->from(route('demo.show', ['slug' => 'zian-sahri']))
            ->post(route('demo.wish', ['slug' => 'zian-sahri']), $payload);

        $response->assertRedirect(route('demo.show', ['slug' => 'zian-sahri']));
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('wishes', [
            'invitation_id' => $invitation->id,
            'guest_name' => 'Ahmad Fauzi',
            'attendance' => 'hadir',
            'message' => 'Selamat untuk kedua mempelai! Semoga sakinah mawaddah warahmah.',
        ]);
    }

    /**
     * Test wish validation fails on invalid data.
     */
    public function test_store_wish_validation_fails(): void
    {
        $theme = Theme::factory()->create();
        Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);

        $response = $this->from(route('demo.show', ['slug' => 'zian-sahri']))
            ->post(route('demo.wish', ['slug' => 'zian-sahri']), [
                'guest_name' => '',
                'attendance' => 'invalid_status',
                'message' => '',
            ]);

        $response->assertSessionHasErrors(['guest_name', 'attendance', 'message']);
        $this->assertDatabaseCount('wishes', 0);
    }

    /**
     * Test submitting a wish via AJAX returns JSON without redirect.
     */
    public function test_can_store_wish_via_ajax_without_page_reload(): void
    {
        $theme = Theme::factory()->create();
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);

        $payload = [
            'guest_name' => 'Okta',
            'attendance' => 'hadir',
            'message' => 'Selamat menempuh hidup baru!',
        ];

        $response = $this->postJson(route('demo.wish', ['slug' => 'zian-sahri']), $payload);

        $response->assertOk()
            ->assertJson([
                'success' => true,
                'message' => 'Terima kasih atas ucapan dan doa restunya!',
                'wish' => [
                    'guest_name' => 'Okta',
                    'attendance' => 'hadir',
                    'message' => 'Selamat menempuh hidup baru!',
                ],
            ]);

        $this->assertDatabaseHas('wishes', [
            'invitation_id' => $invitation->id,
            'guest_name' => 'Okta',
            'attendance' => 'hadir',
        ]);
    }

    /**
     * Test Summer Rustic invitation demo returns demo.summer-rustic view.
     */
    public function test_summer_rustic_invitation_returns_summer_rustic_view(): void
    {
        $theme = Theme::factory()->create([
            'name' => 'Summer Rustic',
            'slug' => 'summer-rustic',
        ]);
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'summer-rustic',
            'groom_nickname' => 'Dimas',
            'bride_nickname' => 'Amanda',
        ]);

        $response = $this->get(route('demo.show', ['slug' => 'summer-rustic', 'to' => 'Nama Tamu']));

        $response->assertOk();
        $response->assertViewIs('demo.summer-rustic');
        $response->assertViewHas('invitation', fn ($inv) => $inv->slug === 'summer-rustic');
        $response->assertViewHas('guestName', 'Nama Tamu');
    }

    /**
     * Test Modern Minimalist invitation demo returns demo.modern-minimalist view.
     */
    public function test_modern_minimalist_invitation_returns_modern_minimalist_view(): void
    {
        $theme = Theme::factory()->create([
            'name' => 'Modern Minimalist',
            'slug' => 'modern-minimalist',
        ]);
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'modern-minimalist',
            'groom_nickname' => 'Adit',
            'bride_nickname' => 'Nadia',
        ]);

        $response = $this->get(route('demo.show', ['slug' => 'modern-minimalist', 'to' => 'Nama Tamu']));

        $response->assertOk();
        $response->assertViewIs('demo.modern-minimalist');
        $response->assertViewHas('invitation', fn ($inv) => $inv->slug === 'modern-minimalist');
        $response->assertViewHas('guestName', 'Nama Tamu');
    }

    /**
     * Test honeypot ignores bot submissions.
     */
    public function test_honeypot_silently_ignores_bot_wishes(): void
    {
        $theme = Theme::factory()->create();
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);

        $payload = [
            'guest_name' => 'Spam Bot',
            'attendance' => 'hadir',
            'message' => 'Spam message',
            'website_hp' => 'http://spam-link.com',
        ];

        $response = $this->postJson(route('demo.wish', ['slug' => 'zian-sahri']), $payload);

        $response->assertOk()->assertJson(['success' => true]);
        $this->assertDatabaseMissing('wishes', ['guest_name' => 'Spam Bot']);
    }

    /**
     * Test wish input sanitizes HTML tags.
     */
    public function test_store_wish_sanitizes_html_tags(): void
    {
        $theme = Theme::factory()->create();
        $invitation = Invitation::factory()->create([
            'theme_id' => $theme->id,
            'slug' => 'zian-sahri',
        ]);

        $payload = [
            'guest_name' => '<b>Hacker</b>',
            'attendance' => 'hadir',
            'message' => '<script>alert(1)</script>Selamat ya!',
        ];

        $this->postJson(route('demo.wish', ['slug' => 'zian-sahri']), $payload);

        $this->assertDatabaseHas('wishes', [
            'invitation_id' => $invitation->id,
            'guest_name' => 'Hacker',
            'message' => 'alert(1)Selamat ya!',
        ]);
    }
}
