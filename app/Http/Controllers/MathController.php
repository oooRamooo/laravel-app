<?php

namespace App\Http\Controllers;

class MathController extends Controller
{
    //
    public function sum(float $a, float $b)
    {
        return $a + $b;
    }

    public function subtract(float $a, $b)
    {
        return $a - $b;
    }
}
