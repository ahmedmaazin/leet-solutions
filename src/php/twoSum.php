<?php

/**
 * Two sum.
 *
 * Description: Given an array of integers nums and an integer target, return indices of the two numbers such that they
 * add up to target. You may assume that each input would have exactly one solution, and you may not use the same
 * element twice. You can return the answer in any order.
 *
 * Example: Input: nums = [2,7,11,15], target = 9 Output: [0,1].
 * Problem Link: https://leetcode.com/problems/two-sum.
 *
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer[]
 */
function twoSum($nums, $target)
{
    for ($i = 0; $i < count($nums); $i++) {
        for ($j = $i + 1; $j < count($nums); $j++) {
            if ($nums[$i] + $nums[$j] == $target) {
                return [$i, $j];
            }
        }
    }
}

$nums = [2, 7, 11, 15];
$target = 9;

$output = twoSum($nums,$target);
print_r("Output: " . json_encode($output) . "\n");