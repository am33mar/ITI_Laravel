<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Track;
use App\Models\Course;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
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
            'branch' => $this->faker->randomElement(['Mansoura', 'Menofia', 'Benha']),
            'number_courses' => $this->faker->numberBetween(1, 30),
            'icon' => $this->faker->imageUrl(800, 600, 'branch'),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Track $track) {
            // Get a random number of course IDs
            $courseIds = Course::all()->random(rand(1, 5))->pluck('id');
            // Attach the selected courses to the track
            $track->courses()->attach($courseIds);
        });
    }
}
