<?php

namespace Database\Factories;

use App\Models\Invitation;
use App\Models\Wish;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Wish>
 */
class WishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invitation_id' => Invitation::factory(),
            'guest_name' => fake()->name(),
            'attendance' => fake()->randomElement(['hadir', 'tidak_hadir', 'ragu']),
            'message' => fake()->sentence(10),
        ];
    }
}
