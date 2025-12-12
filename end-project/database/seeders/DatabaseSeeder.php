<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Story;
use \App\Models\Donation;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Sukuriam rolę
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Sukuriam vartotoją
        $user = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Adminas',
            'password' => bcrypt('12345678'),
        ]);

        // Priskiriam rolę
        $user->assignRole($role);

        \App\Models\User::factory()->create([
            'name' => 'Karolis Sutas',
            'email' => 'karolis@gmail.com',
        ]);

        
        // Story::factory(30)->create()->each(function ($story) {
        //     Donation::factory(5)->create([
        //         'story_id' => $story->id,
        //     ]);
        // });

    }
}
