<?php
//Более быстрое решение через array_unique();

$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];

$nums = array_unique($nums);
$k = count($nums);
echo $k;