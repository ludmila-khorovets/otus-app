<?php

namespace Database\Factories;

use App\Models\Equipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Equipment>
 */
class EquipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Софтбокс 60x90', 'Вспышка Godox', 'Отражатель 5-в-1',
                'Штатив Manfrotto', 'Дымомашина', 'Цветные фильтры'
            ]),
            'description' => $this->faker->realText(200),
            'price_per_hour' => $this->faker->randomFloat(2, 200, 1500),
            'total_quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
