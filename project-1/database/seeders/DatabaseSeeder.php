<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserDetail;
use App\Models\User;
use App\Models\EducationalDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(5)
        ->has(UserDetail::factory())
        ->has(EducationalDetail::factory())
            ->create();

        // $this->call([
        //     UserDetailSeeder::class
        // ]);
    }
}
