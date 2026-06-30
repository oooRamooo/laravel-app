<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    protected $model = City::class;

    public function definition(): array
    {
        return [
            'state_id' => $this->faker->randomNumber(),
            'name' => $this->faker->city(),
        ];
    }
}
