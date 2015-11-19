<?php
namespace Hiring\Exer3;

require 'vendor/autoload.php';

$myfile = file_get_contents('funcionarios.txt');

$datas = new ReaderFile($myfile);
$data = $datas->getInfo();



$view =  "<h1>{$data['Company']['name']}</h1>";
$view .=  "<p>{$data['Company']['address']}</p>";

$view .=  "<table border='1'>";
$view .=  "<tr><th>Nome</th><th>Data de admissão</th><th>Cargo do funcionário</th><th>Salário do funcionário</th><tr>";
foreach($data['Workers'] as $worker){
    $view .= "<tr>";
    $view .=  "<td>{$worker['name']}</td>";
    $view .=  "<td>{$worker['admission']}</td>";
    $view .=  "<td>{$worker['position']}</td>";
    $view .=  "<td>{$worker['salary']}</td>";
    $view .= "</tr>";

}
$view .=  "</table>";

echo $view;


?>