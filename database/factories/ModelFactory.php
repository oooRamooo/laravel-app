<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    protected $model = Model::class;

    public function definition(): array
    {
        return [
            'maker_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name(),
        ];
    }
}
