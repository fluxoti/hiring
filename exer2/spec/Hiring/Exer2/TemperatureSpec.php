<?php

namespace spec\Hiring\Exer2;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TemperatureSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Hiring\Exer2\Temperature');
    }

    function it_should_convert_celsius_to_fahrenheit()
    {
        $this->celsiusToFahrenheit(30)->shouldBeLike(86);

    }

    function it_should_convert_fahrenheit_to_celsius()
    {
        $this->fahrenheitToCelsius(50)->shouldBeLike(10);
    }
}
