<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;
use App\Models\Track;

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
            'track_id' => Track::inRandomOrder()->first()->id,
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Student $student) {
            // Get the courses associated with the track
            $courses = $student->tracks->courses;
            // Attach these courses to the student
            $courseIds = $courses->pluck('id');
            //attach the courses of that track to the new student
            $student->courses()->attach($courseIds);
        });
    }
}
