<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productCode = $this->faker->numerify('##-DUMMY-###-###');

        return [
            'product_code' => $productCode,
            'slug' => $productCode,
            'description' => $this->faker->paragraph,
            'image' => null,
            'origin' => $this->faker->countryCode,
            'price_group' => 'Dummy',
            'weight' => $this->faker->randomFloat(3, 0.5, 15.0),
            'tariff_code' => $this->faker->ean8
        ];
    }
}
