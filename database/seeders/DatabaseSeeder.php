<?php

namespace Database\Seeders;
use Database\Seeders\UserSeeder;
use Database\Seeders\TodoSeeder;
use App\Models\User;
use App\Models\todo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
                $this->call([
            UserSeeder::class,
            TodoSeeder::class,
        ]);
    }
}
