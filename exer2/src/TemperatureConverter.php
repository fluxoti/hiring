<?php

Class TemperatureConverter
{
    public function celsiusToFahrenheit($celsius) {
        return $celsius * 1.8 + 32;
    }

    public function fahrenheitToCelsius($fahrenheit) {
        return ($fahrenheit - 32) / 1.8;
    }
}

?>