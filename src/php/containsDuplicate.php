<?php

/**
 * Contains Duplicate.
 *
 * Description: Given an array of integers, find if the array contains any duplicates. Your function should return
 * true if any value appears at least twice in the array, and it should return false if every element is distinct.
 *
 * Example: Input: [1,2,3,1] Output: true.
 * Problem Link: https://leetcode.com/problems/contains-duplicate.
 *
 * @param Integer[] $nums
 * @return Boolean
 */
function containsDuplicate($nums)
{
    sort($nums);

    for ($i = 0; $i < count($nums) - 1; ++$i) {
        if ($nums[$i] == $nums[$i + 1]) {
            return true;
        }
    }

    return false;
}

$nums = [1, 2, 3, 1];

$output = containsDuplicate($nums);
var_dump($output);