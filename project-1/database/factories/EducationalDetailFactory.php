<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalDetail>
 */
class EducationalDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'program' => fake()->word(),
            'batch' => fake()->word(),
            'passing_year' => fake()->year(),
            'university' => fake()->word()
        ];
    }
}
