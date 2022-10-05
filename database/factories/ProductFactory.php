<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
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
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=> $this->faker()->word(3,true),
            'position'=>$this->faker()->randomElement(['تخفیف روزانه','فروش ویژه','پیشنهاد ما']),
            'primary_image'=>'fake-image.jpg',
            'description'=>$this->faker()->paragraphs(),
            'delivery_amount' => 20000,
            'delivery_amount_per_product' => 10000,
        ];
    }
}
