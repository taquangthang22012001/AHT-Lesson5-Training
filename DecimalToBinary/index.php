<?php
function decimalToBinary($decimal) {
    $stack = [];
    $binary = "";

    while ($decimal > 0) {
        $remainder = $decimal % 2; 
        array_push($stack, $remainder); 
        $decimal = intdiv($decimal, 2); 
    }
    while (!empty($stack)) {
        $binary .= array_pop($stack);
    }
    return $binary;
}

