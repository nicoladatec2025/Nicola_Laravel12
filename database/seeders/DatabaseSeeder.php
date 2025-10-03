<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            StatusSeeder::class,
            UserSeeder::class,
            CourseStatusSeeder::class,
            CourseSeeder::class,
            CourseBatchSeeder::class,
            LessonSeeder::class,
            ModuleSeeder::class,
        ]);

    }
}
