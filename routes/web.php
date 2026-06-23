<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $person = [
        "name" => "Zura",
        "email" => "zura@gmail.com",
    ];
    dd($person);
    return view('welcome');
});

Route::view('/about',"about");

Route::get('/product/{id?}', function (string $id = null) {
    return "Work!".$id;
}) -> whereNumber('id');
