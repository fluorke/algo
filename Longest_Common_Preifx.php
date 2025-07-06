<?php
$arr = [];
$strs = ["flower", "flow", "flight"];
if (count($strs) == 1) return $strs[0];
//$strs = ["reflower","flow","flight"];
//$strs = ["aaa","aa","aaa"];
$max = 0;
for ($i = 0; $i < count($strs); $i++) {
    $str = '';
    $key = '';
    for ($j = 0; $j < strlen($strs[$i]); $j++) {
        //перебор циклом каждого слова по букве
        $str .= $strs[$i][$j];
        //если такой комбинации букв нет - 1 или увеличиваем счетик комбинаций
        if (!array_key_exists($str, $arr)) {
            $arr[$str] = 1;
        } else {
            $arr[$str]++;
            //наибольшее совпадение комб из разных слов = наиб послед 
            if ($arr[$str] >= $max) {
                $max = $arr[$str];
                $key = $str;
            }
        }
    }
}
//Если нам нужно что-бы совпадение было у всех слов, с
// равниваем наиб посл с колличеством элем в массиве
if ($max < count($strs)) {
    echo "";
} else {
    echo $key;
}