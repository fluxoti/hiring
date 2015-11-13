<?php

class temperatureConversion {

    public $convertedTemperature;

    public function fahrenheitToCelsius($temperature){
        return ($temperature - 32) / 1.8;
    }

    public function celsiusToFahrenheit($temperature){
        return ($temperature * 1.8) + 32;
    }

    public function run($temperature, $to){
        if($to == 'C'){
            $this->convertedTemperature = $this->fahrenheitToCelsius($temperature);
        }
        if($to == 'F'){
            $this->convertedTemperature = $this->celsiusToFahrenheit($temperature);
        }
        if($to != 'C' && $to != 'F'){
            $this->convertedTemperature = 'error';
        }
    }

}