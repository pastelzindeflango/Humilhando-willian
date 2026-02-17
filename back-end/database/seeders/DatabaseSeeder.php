<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // create a test user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // seed plans and courses
        $this->call([\Database\Seeders\PlanSeeder::class, \Database\Seeders\CourseSeeder::class]);

        // attach a plan and a course to the test user so the profile shows data
        $plan = \App\Models\Plan::first();
        $course = \App\Models\Course::first();

        if ($plan) {
            $user->plans()->attach($plan->id, ['purchased_at' => now()]);
        }

        if ($course) {
            $user->courses()->attach($course->id, ['completed_at' => now()]);
        }
    }
}
