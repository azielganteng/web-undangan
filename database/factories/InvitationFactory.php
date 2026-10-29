<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invitation>
 */
class InvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'theme_id' => Theme::factory(),
            'slug' => fake()->unique()->slug(2),
            'groom_nickname' => fake()->firstName('male'),
            'groom_fullname' => fake()->name('male').', S.T.',
            'groom_parents' => 'Putra dari Bpk. '.fake()->name('male').' & Ibu '.fake()->name('female'),
            'bride_nickname' => fake()->firstName('female'),
            'bride_fullname' => fake()->name('female').', S.Kom.',
            'bride_parents' => 'Putri dari Bpk. '.fake()->name('male').' & Ibu '.fake()->name('female'),
            'event_date' => fake()->dateTimeBetween('+1 week', '+6 months'),
            'akad_time' => '08:00 - 10:00 WIB',
            'resepsi_time' => '11:00 - 14:00 WIB',
            'venue_name' => fake()->company().' Ballroom',
            'venue_address' => fake()->address(),
            'map_url' => 'https://maps.google.com',
            'audio_url' => '/audio/i-wanna-be-yours.mp3',
            'bank_name' => 'BCA',
            'bank_account_number' => fake()->numerify('##########'),
            'bank_account_holder' => fake()->name('male'),
            'cover_image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=1200&q=80',
        ];
    }
}
