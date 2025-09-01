<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function showName()
    {
        return view('vardas');
    }

    public function showColor($color)
    {
        $allowedColors = ['red', 'green', 'blue', 'yellow', 'purple', 'orange'];
       
        if (!in_array($color, $allowedColors)) {
            abort(404);
        }
 
        return view('color', ['color' => $color]);
    }

    // padaryti linką į /suma/5/8, kuris grąžina 13
    public function sumaFunkcija($a, $b)
    {
        return $a + $b;
    }

    // public function randomColor($color)
    // {
    //     $colors = ['red', 'green', 'blue', 'yellow', 'purple', 'orange'];
    //     $randomColor = $colors[array_rand($colors)];

    //     return view('color', ['color' => $randomColor]);
    // }
}
