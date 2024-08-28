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
        $this->call([
//            CategorySeeder::class,
            ProductSeeder::class,
//            UserSeeder::class

        ]);
//        User::factory()->create([
//            'name' => 'admin',
//            'email' => 'admin@arter.com',
//        ]);
    }
}
