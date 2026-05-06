<?php

namespace Database\Factories;

use App\Models\Hall;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Hall>
 */
class HallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Light Loft', 'Dark Studio', 'Classic Room', 'Neo Neon', 'White Cube']),
            'description' => $this->faker->sentence(15),
            'image' => 'hall' . $this->faker->numberBetween(1, 7) . '.jpg',
            'price_weekday' => $this->faker->numberBetween(1500, 3000),
            'price_weekend' => $this->faker->numberBetween(3500, 5000),
        ];
    }
}
