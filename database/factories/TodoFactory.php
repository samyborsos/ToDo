<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'deadline' => fake()->dateTimeBetween('0days','5months'),
            'category' => fake()->randomElement(['alacsony','kozepes','magas']),
            'done' => fake()->boolean(),
            'done_at' => fake()->dateTimeBetween('0days','5months'),
            'image_url' => 'https://placehold.co/600x400'
        ];
    }
}
