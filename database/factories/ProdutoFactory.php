<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo' => $this->faker->numberBetween(1,9999),
            'nome' => $this->faker->name(),
            'preco'=>$this->faker->randomFloat(2, 0, 10000),
            'categoria' => $this->faker->text(10),
            'status' => $this->faker->text(10),
            
        ];
    }
}
