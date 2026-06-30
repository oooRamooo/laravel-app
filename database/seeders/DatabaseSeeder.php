<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\CarType;
use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'Hatchback'],
                ['name' => 'SUV'],
                ['name' => 'Pickup Truck'],
                ['name' => 'Minivan'],
                ['name' => 'Jeep'],
                ['name' => 'Coupe'],
                ['name' => 'Crossover'],
                ['name' => 'Sports Car'],
            )
            ->count(9)
            ->create();

        FuelType::factory()
            ->sequence(
                ['name' => 'Gasoline'],
                ['name' => 'Diesel'],
                ['name' => 'Electric'],
                ['name' => 'Hybrid'],
            )
            ->count(4)
            ->create();

        $states = [
            'Tokyo' => ['Shinjuku', 'Shibuya', 'Setagaya', 'Taito'],
            'Kanagawa' => ['Yokohama', 'Kawasaki', 'Kamakura', 'Fujisawa'],
            'Osaka' => ['Osaka', 'Sakai', 'Toyonaka', 'Higashiosaka'],
            'Kyoto' => ['Kyoto', 'Uji', 'Kameoka', 'Maizuru'],
            'Aichi' => ['Nagoya', 'Toyota', 'Okazaki', 'Ichinomiya'],
            'Fukuoka' => ['Fukuoka', 'Kitakyushu', 'Kurume', 'Dazaifu'],
            'Hokkaido' => ['Sapporo', 'Hakodate', 'Asahikawa', 'Otaru'],
            'Okinawa' => ['Naha', 'Okinawa', 'Urasoe', 'Ishigaki'],
        ];

        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                        ->count(count($cities))
                        ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }

        $makers = [
            'Toyota' => ['Corolla', 'Prius', 'Yaris', 'Aqua', 'Harrier', 'Land Cruiser'],
            'Honda' => ['Civic', 'Fit', 'Freed', 'Vezel', 'Stepwgn', 'N-Box'],
            'Nissan' => ['Note', 'Leaf', 'Serena', 'X-Trail', 'Skyline', 'Fairlady Z'],
            'Mazda' => ['Mazda2', 'Mazda3', 'CX-3', 'CX-5', 'Roadster', 'CX-60'],
            'Subaru' => ['Impreza', 'Levorg', 'Forester', 'Outback', 'BRZ', 'WRX'],
            'Suzuki' => ['Swift', 'Jimny', 'Hustler', 'Wagon R', 'Spacia', 'Solio'],
            'Mitsubishi' => ['Delica D:5', 'Outlander', 'Eclipse Cross', 'RVR', 'Triton', 'eK X'],
            'Daihatsu' => ['Mira', 'Move', 'Tanto', 'Taft', 'Rocky', 'Copen'],
            'Lexus' => ['IS', 'ES', 'LS', 'NX', 'RX', 'LC'],
        ];

        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                        ->count(count($models))
                        ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }

        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
                Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            ->sequence(fn(Sequence $sequence) => ['position' => $sequence->index % 5 + 1]),
                        'images'
                    )
                    ->hasFeatures(),
                'favoriteCars'
            )
            ->create();
    }
}
