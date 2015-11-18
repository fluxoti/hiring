<?php
$temperature = $_GET['temperature'];
$to = $_GET['to'];

$temperature_converter = new TemperatureConverter();

if ($to == 'C') {
    echo $temperature_converter->fahrenheitToCelsius($temperature);
} else if ($to == 'F') {
    echo $temperature_converter->celsiusToFahrenheit($temperature);
} else {
    echo 'Invalid temperature type.';
}

?>