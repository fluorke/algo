<?php

$first = str_replace(['IV', 'IX', 'XL', 'XC', 'CD', 'CM'], ['-4', '-9', '-40', '-90', '-400', '-900'], "MCMXCIV");

$second = str_replace(['I', 'V', 'X', 'L', 'C', 'D', 'M'], ['-1', '-5', '-10', '-50', '-10', '-500', '-1000'], $first);

$result_arr = explode('-', $second);
$result = array_reduce($result_arr, function ($acc, $item) {
    return $acc += intval ($item);
}, 0);
echo $result;


/**
 * Самые быстрые решения на литкоде по runtime делаются через prev current на реверсной строке, вычитая или прибавляя текущее значение, если оно меньше (вычитаем) или больше/равно предыдущего (прибавляем)
 */