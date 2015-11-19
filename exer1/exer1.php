<?php
foreach(range(1,100) as $i) {
    $val = ($i % 3 == 0 ? "Fizz" : "").($i % 5 == 0 ? "Buzz" : "");
    echo (empty($val) ? '' : $val.'<br />')  ;
}