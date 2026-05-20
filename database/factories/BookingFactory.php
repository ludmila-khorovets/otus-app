<?php

namespace Database\Factories;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Hall;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hours = $this->faker->numberBetween(1, 5);

        $startAt = $this->faker->dateTimeBetween('now', '+2 weeks');
        $endAt = (clone $startAt)->modify("+{$hours} hours");

        return [
            'hall_id' => Hall::factory(),
            'user_id' => User::factory(),
            'start_at' => $startAt,
            'end_at' => $endAt,
            'total_price' => $this->faker->randomFloat(2, 1000, 1500),
            'total_hours' => $hours,
            'client_note' => $this->faker->realTextBetween(10, 50),
            'status' => $this->faker->randomElement(BookingStatus::values()),
        ];
    }
}
