<?php

//35. Search Insert Positions

/**Given a sorted array of distinct integers and a target value, return the index if the target is found. If not, return the index where it would be if it were inserted in order.
You must write an algorithm with O(log n) runtime complexity. 

Example 1:
Input: nums = [1,3,5,6], target = 5
Output: 2

Example 2:
Input: nums = [1,3,5,6], target = 2
Output: 1

Example 3:
Input: nums = [1,3,5,6], target = 7
Output: 4

*/

//ideads - use binary search to reach n log n;
//but also need modification to find index for insert
function searchInsert($nums, $target)
{
    if (count($nums) <= 1)
        return -1;
    $high = count($nums) - 1;
    $low = 0;
    $high;
    $insIdx = 0;

    if ($target < $nums[0]) return 0;
    if ($target > $nums[$high]) return $high + 1;

    while ($low <= $high) {
        $mid = $low + ($high - $low) / 2;
        //echo $nums[$low] . ' ' . $nums[$mid] . ' ' . $nums[$high] . PHP_EOL;

        if ($target == $nums[$mid])
            return (int) $mid;

        if ($target < $nums[$mid]) {
            $high = $mid - 1;
        }

        if ($target > $nums[$mid]) {
            $low = $mid + 1;
        }

        if ($nums[$high] - $nums[$mid] == 2) {
            $insIdx = $mid + 1;
        }

        if ($nums[$high] - $nums[$mid] == 0) {
            $insIdx = 1;
        }

    }
    return (int) $insIdx;
}

echo searchInsert([1,3,5,6], 5);
echo searchInsert([1,3,5,7], 2); 
echo searchInsert([1,3,5,6], 7);

