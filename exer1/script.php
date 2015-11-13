<?php

include_once('../voltar.html');

for($i=1; $i <= 100; $i++){

    echo $i==1 || $i==51 ? "<div style='float: left; padding: 20px'>" : '';

    $line = $i.': ';

    $line .= ($i % 3) == 0 ? 'Fizz' : '';

    $line .= ($i % 5) == 0 ? 'Buzz' : '';

    echo "{$line}<br>";

    echo $i==50 || $i==100 ? "</div>" : '';

}

?>