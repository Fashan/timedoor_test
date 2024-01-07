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
        \App\Models\Author::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Book::factory(20)->create();
        \App\Models\Rating::factory(300)->create();

        // \App\Models\Author::factory(1000)->create();
        // \App\Models\Category::factory(3000)->create();
        // \App\Models\Book::factory(100000)->create();
        // \App\Models\Rating::factory(500000)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
