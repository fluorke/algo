<?php

$nums1 = [0, 1, 2, 2, 3, 0, 4, 2, 1];
$nums2 = [3, 2, 2, 3];

function removeElement(&$nums, $val)
{
    $index = 0;
    $len = count($nums);
    for ($i = 0; $i < count($nums); $i++) {
        if ($nums[$i] !== $val) {
            if ($index < $i) {
                $nums[$index] = $nums[$i];
                $nums[$i] = $val;
            }
            $index++;
        } else {
            $len--;
        }
    }
    $c = count($nums) - $len;
    while ($c > 0) {
        array_pop($nums);
        $c--;
    }
    echo $len . PHP_EOL;
    print_r($nums);
}

removeElement($nums1, 2);
removeElement($nums2, 3);