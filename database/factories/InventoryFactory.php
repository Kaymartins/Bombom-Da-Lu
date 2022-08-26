<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product_id = Product::all()->pluck('id')->toArray();
        $random_product = array_rand($product_id);

        return [
            'amount' => $this->faker->randomDigitNot(0),
            'date' => $this->faker->date(),
            'product_id' => $product_id[$random_product]
        ];
    }
}
