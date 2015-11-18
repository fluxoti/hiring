<?php
    for ($i = 1; $i <= 100; $i++) {
        $message = '';
        if ($i % 3 == 0) {
            $message .= 'Fizz';
        }
        if ($i % 5 == 0) {
            $message .= 'Buzz';
        }

        if (!empty($message)){
            echo $message . "\n";
        }
    }

?>