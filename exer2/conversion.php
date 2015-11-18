<?php
namespace Hiring\Exer2;

require 'vendor/autoload.php';


$error = $conversion = "";

if(isset($_GET['temperature']) && isset($_GET['to'])){

    $temperature = $_GET['temperature'];

    if(isset($_GET['to'])) {
        $to = $_GET['to'];

        if (in_array($to, array('F', 'C'), true)) {
            $convert = new Temperature();
            if ($to == 'F') {
                $conversion = $convert->celsiusToFahrenheit($temperature);
            } else {
                $conversion = $convert->fahrenheitToCelsius($temperature);
            }
        } else {
            $error = 'Paramenter "to" must be C or F';
        }
    }else{
        $error = 'Paramenter "to" is not defined <br> Example: conversion.php?temperature=172&to=C';
    }

}else{
    $error = 'Paramenter "temperature" is not defined <br> Example: conversion.php?temperature=172&to=C';
}

echo $conversion;
echo $error;




?>