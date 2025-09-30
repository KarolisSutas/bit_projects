<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Story;
use \App\Models\Donation;

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

        
        Story::factory(30)->create()->each(function ($story) {
            Donation::factory(5)->create([
                'story_id' => $story->id,
            ]);
        });

    }
}
