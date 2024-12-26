<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => collect(fake()->words(5))->join(' '),
            'description' => fake()->randomHtml(),
            'ends_at' => fake()->dateTimeBetween('now', '+3 days'),
            'status' => fake()->randomElement(['open', 'closed']),
            'tech_stack' => fake()->randomElements(['nodejs', 'react', 'javascript', 'vite', 'nextjs'], fake()->numberBetween(1, 5)),
            'created_by' => User::factory(),
        ];
    }
}
