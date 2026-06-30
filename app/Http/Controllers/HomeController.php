<?php

namespace App\Http\Controllers;

use App\Models\Car;
use function view;

class HomeController extends Controller
{
    //
    public function index()
    {
//        $cars = Car::get();
//
//        //select publish card
//        $cars = Car::where('published_at', '!=', null)->get();
//
//        $car = Car::where('published_at', '!=', null)->first();

//        $cars = Car::where('published_at', '!=', null)
//            ->where('user_id', 1)
//            ->orderBy('published_at', 'desc')
//            ->limit(2)
//            ->get();
//        dump($cars);

//        $car = new Car();
//        $car->maker_id = 1;
//        $car->model_id = 1;
//        $car->year = 1900;
//        $car->price = 100;
//        $car->vin = 123;
//        $car->mileage = 123;
//        $car->car_type_id = 1;
//        $car->fuel_type_id = 1;
//        $car->user_id = 1;
//        $car->city_id = 1;
//        $car->address = "test";
//        $car->phone = "123";
//        $car->description = null;
//        $car->published_at = now();
//        $car->save();

//
//        $carData = [
//            'maker_id' => 1,
//            'model_id' => 1,
//            'year' => 2021,
//            'price' => 30000,
//            'vin' => 123,
//            'mileage' => 123,
//            'car_type_id' => 1,
//            'fuel_type_id' => 1,
//            'user_id' => 1,
//            'city_id' => 1,
//            'address' => 'Some address',
//            'phone' => '999',
//            'description' => 'Some description',
//            'published_at' => now(),
//        ];

//      1 approach
//        $car = Car::create($carData);

//        2 approach
//        $car2 = new Car();
//        $car2->fill($carData);
//        $car2->save();

////        3 approach
//        $car3 = new Car($carData);
//        $car3->save();

//        $carData = [
//            'maker_id' => 1,
//            'model_id' => 1,
//            'year' => 2021,
//            'price' => 30000,
//            'vin' => 123,
//            'mileage' => 123,
//            'car_type_id' => 1,
//            'fuel_type_id' => 1,
//            'user_id' => 1,
//            'city_id' => 1,
//            'address' => 'Some address',
//            'phone' => '999',
//            'description' => 'Some description',
//            'published_at' => now(),
//        ];
//        $car = Car::updateOrCreate(
//            ['vin' => '999', 'price' => 30000],
//            $carData);
//        dump($car);

//        $car = Car::find(1);
//        $car->delete();

//        $car = Car::withTrashed()->find(1)->restore();
//        Car::destroy([2, 3]);
//        Car::where('published_at', null)
//            ->where('user_id', 1)
//            ->delete();
//
//        $cars = Car::all();
//
//        dump($cars);

//
//        Car::where('published_at', null)
//            ->where('user_id', 1)
//            ->update(['published_at' => now()]);

//        $cars = Car::where('price', '>', 2000)->get();
//        dump($cars);
//        $maker = Maker::where('name', 'Toyota')->first();
//        dump($maker);
//        Fueltype::create(['name' => 'Electric']);
//        Car::where('id', 1)->update(['price' => 15000]);
//        Car::where('year', 2020)->delete();

//
//        $car = Car::find(6);
//        dump($car->features, $car->primaryImage);
//
////        $car->features->abs = 0;
////        $car->features->save();
//
//        $car->features->update(['abs' => 0]);
//        $car->primaryImage->delete();
//
//
//        $car = Car::find(7);
//
//        $car->features()->save();

//        $car = Car::find(6);

//        $image = new CarImage(['image_path' => 'somthing', 'position' => 2]);
//        $car->images()->save($image);


//        $car->images()->create(['image_path' => 'somthing2', 'position' => 3]);
//        dd($car->images);

//        $car->images()->saveMany([
//            new CarImage(['image_path' => 'something', 'position' => 4]),
//            new CarImage(['image_path' => 'something', 'position' => 5]),
//        ]);
//        $car->images()->createMany([
//            ['image_path' => 'something', 'position' => 6],
//            ['image_path' => 'something', 'position' => 7],
//        ]);
//
//        $carType = CarType::where('name', 'Hatchback')->first();
//        dump($car);
//        $cars = Car::whereBelongsTo($carType)->get();
//        dump($cars);

//        $car = Car::find(6);
//        dd($car->favouredUsers);

//        $user = User::find(1);
//        dd($user->favoriteCars);

//        $user = User::find(1);
//////        $user->favoriteCars()->attach([1, 2]);
////
////        $user->favoriteCars()->sync([3, 4]);
//
//        $user->favoriteCars()->detach();

//        $maker = Maker::factory()->count(10)->create([]);
//
//        dd($maker);

//        User::factory()
//            ->count(10)
//            ->sequence(
//                ['name' => 'zura'],
//                ['name' => 'miranda'],
//            )
//            ->sequence(fn(Sequence $sequence) => ['name' => 'NAME ' . $sequence->index])
//            ->create();

//        Maker::factory()
//            ->count(1)
//            ->hasModels(1)
//            ->create();


//        User::factory()
//            ->has(Car::factory()->count(5), 'favoriteCars')
//            ->hasAttached(Car::factory()->count(5), 'favoriteCars')
//            ->create();

        $cars = Car::where('published_at', '<', now())
            ->orderBy('published_at', 'desc')
            ->limit(10)
            ->get();

        return view('home.index', ['cars' => $cars]);
    }

}
