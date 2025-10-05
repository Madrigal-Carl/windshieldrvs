<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Assessment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);

        $baseLat = 13.4750;
        $baseLng = 121.8380;
        $severities = ['low', 'moderate', 'high'];
        for ($i = 0; $i < 5; $i++) {
            Assessment::create([
                'latitude' => $baseLat + ((rand(-50, 50)) / 1000),
                'longitude' => $baseLng + ((rand(-50, 50)) / 1000),
                'severity' => $severities[array_rand($severities)],
            ]);
        }
    }
}
