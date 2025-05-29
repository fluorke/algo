<?php

function skobki($string)
{
    $digits = [];
    $x = 0;
    $prev = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] == '(') {
            if ($x < 0) $x = 0;
            $x++;
        }
        if ($string[$i] == ')') {
            $x--;
            if ($x < 0) $x = 0;
        }

        if ($i > 0) {
            if ($prev > $x) $digits[] = 1;
            else $digits[] = 0;
        }
        $prev = $x;
    }

    return $digits;
}


function calc($arr)
{
    $zero = 0;
    $one = 0;
    $max = 0;
    $count = 0;
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        if ($arr[$i] == 0 && $one > 0) {
            $zero++;
            if($zero > $one) {
                $count = 0;
                $one = 0;
            }
        }
        if ($arr[$i] == 1) {
            $one++;
            $count++;
            if($count > $max) $max = $count;
        }
    }
    echo $max * 2 . PHP_EOL;
}


//calc(skobki('(()())'));
//calc(skobki('(()(()'));
//calc(skobki('")()())"'));
//print_r(skobki('(()(()'));
calc(skobki('(()(()'));
//print_r(skobki('(()(()'));
calc(skobki(")()())"));
//print_r(skobki(")()())"));
calc(skobki(")()())()()("));
//print_r(skobki(")()())()()("));
calc(skobki("()(())"));
//print_r(skobki("()(())"));
print_r(skobki("(())()(()(("));

