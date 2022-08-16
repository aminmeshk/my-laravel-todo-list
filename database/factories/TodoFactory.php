<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fakeTodo = [
            'user_id' => fake()->numberBetween(1, 5),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'done' => fake()->boolean(),
        ];
        if ($fakeTodo['done']) {
            $fakeTodo['done_at'] = Carbon::now();
        }
        return $fakeTodo;
    }
}
