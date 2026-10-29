<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test routes are properly registered.
     */
    public function test_routes_are_registered(): void
    {
        $this->assertTrue(Route::has('landing'));
        $this->assertTrue(Route::has('testimonial.store'));
        $this->assertTrue(Route::has('demo.show'));
        $this->assertTrue(Route::has('demo.wish'));
    }

    /**
     * Test landing page renders successfully with theme data.
     */
    public function test_landing_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('GA DIGITAL');
        $response->assertSee('Katalog Tema');
        $response->assertSee('Paket Harga');
        $response->assertSee('Mereka Yang Telah Berbahagia');
        $response->assertSee('Undangan Dibuat');
        $response->assertSee('Undangan Disebar');
        $response->assertSee('Testimoni Bahagia');
    }
}
