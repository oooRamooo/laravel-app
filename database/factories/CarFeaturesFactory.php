<?php

namespace Database\Factories;

use App\Models\CarFeatures;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFeaturesFactory extends Factory
{
    protected $model = CarFeatures::class;

    public function definition(): array
    {
        return [
            'abs' => $this->faker->boolean(),
            'air_conditioning' => $this->faker->boolean(),
            'power_windows' => $this->faker->boolean(),
            'power_door_locks' => $this->faker->boolean(),
            'cruise_control' => $this->faker->boolean(),
            'bluetooth_connectivity' => $this->faker->boolean(),
            'remote_start' => $this->faker->boolean(),
            'gps_navigation' => $this->faker->boolean(),
            'heated_seats' => $this->faker->boolean(),
            'climate_control' => $this->faker->boolean(),
            'rear_parking_semsors' => $this->faker->boolean(),
            'leather_seats' => $this->faker->boolean(),
        ];
    }
}
