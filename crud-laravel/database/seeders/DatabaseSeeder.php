<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $faker = Faker::create();
        $books = [];
        for ($i = 0; $i < 20; $i++) {
            $books[] = [
            'title' => $faker->sentence(3),
            'author' => $faker->name,
            'published_year' => $faker->year,
            ];
        }
 
        DB::table('books')->insert($books);
    }
}
