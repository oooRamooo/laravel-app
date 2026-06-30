<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition(): array
    {
        return [
            'maker_id' => Maker::inRandomOrder()->first()->id,
            'model_id' => function (array $attributes) {
                return Model::where('maker_id', $attributes['maker_id'])->inRandomOrder()->first()->id;
            },
            'year' => $this->faker->year(),
            'price' => (int)$this->faker->randomFloat(2, 5, 100) * 1000,
            'vin' => strtoupper(Str::random(17)),
            'mileage' => (int)$this->faker->randomFloat(2, 5, 500),
            'fuel_type_id' => FuelType::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
            'address' => $this->faker->address(),
            'phone' => function (array $attributes) {
                return User::find($attributes['user_id'])->phone;
            },
            'description' => $this->faker->text(2000),
            'published_at' => $this->faker->optional(0.9)
                ->dateTimeBetween('-30 days', 'now'),
            'car_type_id' => CarType::inRandomOrder()->first()->id,
        ];
    }
}
