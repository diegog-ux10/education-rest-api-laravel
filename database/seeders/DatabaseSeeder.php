<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $teacherModel = new TeacherSeeder();
        // $teacherModel->run();

        // $studentModel = new StudentSeeder();
        // $studentModel->run();

        $courseModel = new CourseSeeder();
        $courseModel->run();
    }
}
