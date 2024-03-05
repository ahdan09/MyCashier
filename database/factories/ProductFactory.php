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
        return [
            'name' => $this->faker->unique()->word,
            'harga_beli' => $this->faker->numberBetween(10000, 500000),
            'harga_jual' => $this->faker->numberBetween(10000, 500000),
            'stock' => $this->faker->numberBetween(5, 100),
        ];
    }
}
