<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\CarImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarImageFactory extends Factory
{
    protected $model = CarImage::class;

    public function definition(): array
    {
        return [
            'image_path' => $this->faker->imageUrl(),
            'position' => function (array $attributes) {
                return Car::find($attributes['car_id'])->images()->count() + 1;
            },
        ];
    }
}
