<?php

include_once('../voltar.html');
include_once('src/temperatureConversion.php');
include_once('events.js');

$html = 'Temperatura
            <input id="temperature">
         Para
            <select id="to">
                <option value="C">Celsius</option>
                <option value="F">Fahrenheit</option>
            </select>
        <button style="
            color: #FFF;
            background-color: #900;
            font-weight: bold;
        " type="button" onclick="convertTemp()">Converter</button>';

if(isset($_GET['temperature']) && isset($_GET['to'])){
    $convert = new temperatureConversion();
    $convert->run($_GET['temperature'], $_GET['to']);
    $html .= '<br><br>
                Resultado: '.round($convert->convertedTemperature, 2).' °'.$_GET['to'];
}

echo $html;

?>