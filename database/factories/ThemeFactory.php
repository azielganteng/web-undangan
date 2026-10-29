<?php

namespace Database\Factories;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Theme>
 */
class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(2, true);

        return [
            'name' => ucwords($name),
            'slug' => fake()->unique()->slug(),
            'category' => fake()->randomElement(['Wedding', 'Engagement', 'Khitan']),
            'thumbnail' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=800&q=80',
            'price' => fake()->randomElement([99000, 129000, 149000, 199000]),
            'badge' => fake()->randomElement(['Populer', 'Terbaru', null]),
        ];
    }
}
