<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'weight' => $this->faker->randomFloat(2, 0.5, 10),
           // 'category_id'=> Category::inRandomOrder()->first()->id, // assuming category_id references an existing category
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
