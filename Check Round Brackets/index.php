<?php
function CheckBrackets($expressions) {
    $stack = new SplStack(); 

    for ($i = 0; $i < strlen($expressions); $i++) {
        $sym = $expressions[$i]; 

        if ($sym === '(') {
            $stack->push($sym);
        }

        elseif ($sym === ')') {
            if ($stack->isEmpty()) {
                return false;
            }
            $left = $stack->pop();

            if (($sym === ')' && $left !== '(')) 
            {
                return false;
            }
        }
    }
    return $stack->isEmpty();
}
