<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'thumbnail' => 'https://picsum.photos/640/480',
            'rating' => $this->faker->randomNumber(2, -100, 100) . '/' . $this->faker->randomNumber(2, -100, 100),
            'preview' => fake()->sentence(),
            'user_id' => User::factory(),
        ];
    }
}
