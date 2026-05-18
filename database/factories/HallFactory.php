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
        $fakerEn = \Faker\Factory::create('en_US');

        return [
            'name' => $fakerEn->city,
            'is_active' => $this->faker->boolean(),
            'description' => $this->faker->sentence(20),
            'image' => 'hall' . $this->faker->numberBetween(1, 7) . '.jpg',
            'price_weekday' => $this->faker->numberBetween(1500, 3000),
            'price_weekend' => $this->faker->numberBetween(3500, 5000),
        ];
    }
}
