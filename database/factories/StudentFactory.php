<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'grade' => $this->faker->numberBetween(1, 100),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'image' => $this->faker->imageUrl(800, 600, 'student'),
        ];
    }
}
