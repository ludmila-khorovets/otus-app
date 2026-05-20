<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isRegistered = $this->faker->boolean();

        return [
            'text' => $this->faker->sentence(10),
            'user_id' => $isRegistered ? User::factory() : null,
            'guest_name' => !$isRegistered ? $this->faker->name() : null,
            'guest_email' => !$isRegistered ? $this->faker->safeEmail() : null,
            'rating' => $this->faker->numberBetween(0, 5),
            'commentable_id' => 1,
            'commentable_type' => 'App\Models\Studio',
        ];
    }
}
