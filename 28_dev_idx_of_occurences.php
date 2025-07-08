<?php 
/* 28. Find the Index of the First Occurrence in a String

Given two strings needle and haystack, return the index of the first occurrence of needle in haystack, or -1 if needle is not part of haystack.

first approach is to use php func - strpos

haystack = "sadbutsad", needle = "sad"
Output: 0
Explanation: "sad" occurs at index 0 and 6.
The first occurrence is at index 0, so we return 0.

haystack = "leetcode", needle = "leeto"
Input: haystack = "leetcode", needle = "leeto"
Output: -1
Explanation: "leeto" did not occur in "leetcode", so we return -1. */

function firstOcc($haystack, $needle) 
{
    $pos = strpos($haystack, $needle);
    if ($pos !== false) {
        return $pos;
    } else {
        return -1;
    }
};

function firstOccLoop($haystack, $needle)
{
    $len = 0;
    for ($i=0; $i < strlen($haystack); $i++) { 
        if ($needle[$len] == $haystack[$i]) {
            if ($len + 1 == strlen($needle)) {
                return $i - $len;
            }
            $len++;
        } else {
            $len = 0;
        }
    }
    return -1;
};

function test(callable $function, $haystack, $needle, $value) {
    $res = $function($haystack, $needle) === $value;
    if ($res) {
        echo ' ok ' . PHP_EOL;
    } else {
        echo ' false ' . PHP_EOL;
    }
};

test('firstOcc',"sadbutsad", "sad", 0);
test('firstOcc',"leetcode", "leeto", -1);

test('firstOccLoop',"sadbutsad", "sad", 0);
test('firstOccLoop',"leetcode", "leeto", -1);
test('firstOccLoop',"tsadz", "z", 4);

