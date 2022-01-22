<?php

namespace Database\Factories\V1\Jurnallar;

use App\Models\V1\Jurnallar\Jurnallar;
use Illuminate\Database\Eloquent\Factories\Factory;

class JurnallarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jurnallar::class;

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
        'authors' => $this->faker->word,
        'abstr_content' => $this->faker->text,
        'abstraksiya_pdf' => $this->faker->word,
        'abiut_cite_article' => $this->faker->text,
        'full_journal_pdf' => $this->faker->word,
        'created_user_id' => $this->faker->randomDigitNotNull,
        'send_user_id' => $this->faker->randomDigitNotNull,
        'volume_journal_id' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'views_count' => $this->faker->randomDigitNotNull,
        'down_count_abstr' => $this->faker->randomDigitNotNull,
        'down_count_fulls' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
