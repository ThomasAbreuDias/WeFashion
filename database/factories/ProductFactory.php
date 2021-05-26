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
        $status = ['published', 'unpublished'];
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomNumber(2),//nbDigits = 2
            'reference' => $this->faker->regexify('[A-Za-z0-9]{16}'),
            'status' => $status[rand(0,1)],
            'discounted' => rand(0,1),
            //'category_id' => \App\Models\Category::find(rand(1, 2)),
        ];
    }
}
