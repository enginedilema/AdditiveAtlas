<?php

namespace Database\Seeders;

use App\Models\Additive;
use App\Models\AdditiveDetail;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        
        $this->call([
            AdditiveSeeder::class,
            AdditiveDetailSeeder::class,
            AdditiveTranslationSeeder::class,
            AdditiveDetailTranslationSeeder::class,
        ]);
    }
}
