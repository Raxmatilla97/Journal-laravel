<?php

namespace Database\Factories\V1\Jurnallar;

use App\Models\V1\Jurnallar\JurnalToplami;
use Illuminate\Database\Eloquent\Factories\Factory;

class JurnalToplamiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JurnalToplami::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
        'slug' => $this->faker->word,
        'image' => $this->faker->word,
        'status' => $this->faker->word,
        'full_content' => $this->faker->text,
        'views_count' => $this->faker->word,
        'down_count_fulls' => $this->faker->randomDigitNotNull,
        'complite' => $this->faker->word,
        'archive' => $this->faker->word,
        'full_pdf_doc' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
