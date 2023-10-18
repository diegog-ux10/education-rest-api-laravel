<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => fake()->word(),
            'teacher_id' => function () {
                return Teacher::inRandomOrder()->first()->id;
            },
        ];
    }
}

// $table->id();
// $table->string('name');
// $table->unsignedBigInteger('teacher_id');
// $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
// $table->timestamps();
