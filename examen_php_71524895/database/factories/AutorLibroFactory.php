<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AutorLibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'autor_id' => $this->faker->numberBetween(1, 5),
            'libro_id' => $this->faker->numberBetween(1, 500),
        ];
    }
}
