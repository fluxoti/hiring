<?php

namespace Hiring\Exer2;

class Temperature
{
    public function fahrenheitToCelsius($fahrenheit)
    {
        $celsius=5/9*($fahrenheit-32);
        return $celsius ;
    }

    public function celsiusToFahrenheit($celsius)
    {
        $fahrenheit=$celsius*9/5+32;
        return $fahrenheit ;
    }
}
