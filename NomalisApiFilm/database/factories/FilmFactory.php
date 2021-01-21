<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    protected $model = Film::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3, true),
            'year' => $this->faker->numberBetween(2000, 2050),
            // 'actors'=> $this->faker->randomElement(['David', 'Layon','Max','Landra']),
        ];
    }
}
