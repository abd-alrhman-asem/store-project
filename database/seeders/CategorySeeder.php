<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Category::factory()->count(250)->create();
        // Create categories
        Category::factory()->count(250)->create()->each(function ($category) {
            if (rand(0, 1)) {
                $category->category_id = Category::inRandomOrder()->first()->id;
                $category->save();
            }
        });
    }
}
