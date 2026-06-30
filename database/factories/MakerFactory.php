<?php

namespace Database\Factories;

use App\Models\Maker;
use Illuminate\Database\Eloquent\Factories\Factory;

class MakerFactory extends Factory
{
    protected $model = Maker::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
