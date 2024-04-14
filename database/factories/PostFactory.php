<?php

namespace Database\Factories;

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
            'excerpt' => fake()->sentence(),
            'description' => fake()->paragraph(1),
            'user_id' => 1,
            'category_id' => 1,
            'image' => fake()->imageUrl()
        ];
    }
}
