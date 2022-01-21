<?php

namespace Database\Factories;

use App\Models\Testswag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestswagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testswag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull
        ];
    }
}
