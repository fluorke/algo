<?php

//Задача: написать программу которая выводит строку в форме круга.
echo 'ВСЕМ ПРИВЕТ' . '<br>';

$str = '0123456789';
$str = strtoupper($str);
$str_len = mb_strlen($str);

$n = 40;
for ($i = 0; $i < $n; $i++) {
    $arr[] = array_fill(0, 40, '   ');
}

$d = 18;
$angle = 360 / mb_strlen($str);
$povorot = $angle;

//echo "angle $angle";
$rad = $angle * (pi() / 180);

$centr = count($arr) / 2;
//echo "centr $centr" . '<br>';
$arr[$centr][$centr] = 'O';
for ($i = 0; $i < $str_len; $i++) {
    $rad = $povorot * (pi() / 180);
    $x = 0 + $d * cos($rad);
    $y = 0 + $d * sin($rad);

    $arr[$centr - $y][$centr + $x] = "<b>$str[$i]</b>";    
    $povorot += $angle;
}
//$d = 18;
// $arr[$centr][$centr] = 'O';
// $arr[$centr - 9][$centr + 5] = 'X'; // y9 x5 
// $arr[$centr - 9][$centr + (-5)] = 'X'; // -5 9
// $arr[$centr - (-0)][$centr + (-10)] = 'X'; // -0 -10
// $arr[$centr - (-9)][$centr + (-5)] = 'X'; // -9 -5 
// $arr[$centr - (-9)][$centr + (5)] = 'X'; // -9 5
// $arr[$centr - (-0)][$centr + (10)] = 'X'; // -0 10


// Формула для расчета координат точки: x = x₀ + r * cos(α), y = y₀ + r * sin(α), где (x₀, y₀) - координаты центра окружности, r - радиус, а α - угол поворота. 

//координаты центра окружности x = [arr_len / 2] y = [arr_len / 2]
//радиус r = arr_len / 2
//угол поворта a = 360 / $n (6) = 60*
//P - пенпедикуляр = r * sin(ugol)

//print
echo '<pre>';
foreach ($arr as $k => $v) {
    echo '<br>';
    foreach ($v as $kk => $vv) {
        //echo $vv >= 10 ? $vv : "-$vv"; 
        echo $vv;
    }
}
echo '<pre>';
