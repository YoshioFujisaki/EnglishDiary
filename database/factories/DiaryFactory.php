<?php

namespace Database\Factories;

use App\Models\Diary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{

    protected $model = Diary::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $enFaker = \Faker\Factory::create('en_US');

        return [
            'sentence' => $this->faker->realText,
            'sentence_en' => $enFaker->realText(),
            'created_at' => $this->faker->dateTimeBetween('-1 week', 'now')->format('Y-m-d'),
        ];
    }
}
