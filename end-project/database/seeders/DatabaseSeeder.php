<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Karolis Sutas',
            'email' => 'karolis@gmail.com',
        ]);

        \App\Models\Story::factory(30)->create();
        \App\Models\Donation::factory(100)->create();

    }
}
