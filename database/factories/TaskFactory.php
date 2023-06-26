<?php

namespace Database\Factories;

use App\Models\Business;
use App\Models\Person;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $people = Person::pluck('id');
        $business = Business::pluck('id');

        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['open', 'completed']),
            'taskable_id' => fake()->numberBetween(1, 70),
            'taskable_type' => fake()->randomElement(['App\Models\Business', 'App\Models\Person'])
        ];
    }
}
