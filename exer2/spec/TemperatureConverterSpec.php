<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemperatureConverterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('TemperatureConverter');
    }

    function it_convert_celsius_to_fahrenheit()
    {
        $this->celsiusToFahrenheit(0)->shouldBeLike(32);
    }

    function it_convert_fahrenheit_to_celsius()
    {
        $this->fahrenheitToCelsius(212)->shouldBeLike(100);
    }
}
