<?php

namespace Database\Factories;

use App\Models\Story;
use App\Models\User;
use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Story>
 */
class StoryFactory extends Factory
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
            'full_name' => fake()->name,
            'story_title' => fake()->sentence(6),
            'description' => fake()->paragraph(4, true),
            'required_amount' => fake()->numberBetween(1_000, 150_000),
            'collected_amount' => fake()->numberBetween(50, 10_000),
            'category' => fake()->randomElement(Story::$category),
        ];
    }
}
