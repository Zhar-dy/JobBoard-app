<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'category' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'salary' => $this->faker->randomNumber(5),
            'location' => $this->faker->city,
            'status' => 'Pending',

        ];
    }
}
