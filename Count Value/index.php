<?php
function countValue($numbers, $value) {
    $count = 0;

    foreach ($numbers as $number) {
    
        if ($number == $value) {
            $count++;
        }
    }

    return $count;
}

