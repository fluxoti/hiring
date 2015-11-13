<?php

include_once('../voltar.html');
include_once('src/fileReader.php');

$file = "funcionarios.txt";

$display = new fileReader();
$display->run($file);

echo $display->getDisplay();