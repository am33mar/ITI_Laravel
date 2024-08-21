<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Models\Track;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'total_grade' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(1),


        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            // Get a random number of course IDs
            $trackIds = Track::all()->random(rand(1, 5))->pluck('id');
            // Attach the selected courses to the track
            $course->tracks()->attach($trackIds);
            // Attach the course to students enrolled in these tracks
            foreach ($trackIds as $trackId) {
                $students = Track::find($trackId)->students;
                foreach ($students as $student) {
                    $student->courses()->attach($course->id);
                }
            }
        });
    }
}
