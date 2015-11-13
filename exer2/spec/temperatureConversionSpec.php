<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class temperatureConversionSpec extends ObjectBehavior
{
    function it_converts_fahrenheit_to_celsius()
    {
        $this->fahrenheitToCelsius((double)95)->shouldReturn((double)35);
    }

    function it_converts_celsius_to_fahrenheit()
    {
        $this->celsiusToFahrenheit((double)35)->shouldReturn((double)95);
    }

    function it_returns_conversion_to_celsius(){
        $this->run((double)95, 'C');
        $this->convertedTemperature->shouldReturn((double)35);
    }

    function it_returns_conversion_to_fahrenheit(){
        $this->run((double)35, 'F');
        $this->convertedTemperature->shouldReturn((double)95);
    }

    function it_returns_an_error_string(){
        $this->run((double)13, 'X');
        $this->convertedTemperature->shouldReturn('error');
    }
}
