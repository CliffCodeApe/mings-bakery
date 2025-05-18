<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $categories = ['Cakes', 'Breads', 'Pastries', 'Cookies'];

        return [
            'name' => $this->faker->unique()->words(2, true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 100),
            'category' => $this->faker->randomElement($categories),
            'image_url' => 'products/'.$this->faker->image('public/storage/products', 400, 300, null, false),
            'is_available' => $this->faker->boolean(90) // 90% chance of being available
        ];
    }
}
