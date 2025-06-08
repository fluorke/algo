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
        $str .= $strs[$i][$j];
        if (!array_key_exists($str, $arr)) {
            $arr[$str] = 1;
        } else {
            $arr[$str]++;
            if ($arr[$str] >= $max) {
                $max = $arr[$str];
                $key = $str;
            }
        }
    }
}
if ($max < count($strs)) {
    echo "";
} else {
    echo $key;
}