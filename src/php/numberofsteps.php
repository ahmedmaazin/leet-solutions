<?php

/**
 * Number of steps to reduce a number to zero.
 *
 * Description: Given a non-negative integer num, return the number of steps to reduce it to zero. If the current number is even,
 * you have to divide it by 2, otherwise, you have to subtract 1 from it.
 *
 * Example: Input: num = 14 Output: 6.
 * Problem Link: https://leetcode.com/problems/number-of-steps-to-reduce-a-number-to-zero.
 *
 * @param Integer $num
 * @return Integer
 */
function numberOfSteps($num)
{
    if ($num == 0) {
        return 0;
    }

    if ($num == 1) {
        return 1;
    }

    $step = 0;

    for ($i = $num; $i >= 0; $i--) {
        if ($num <= 0) {
            break;
        }

        if ($num % 2 == 0) {
            $num = $num / 2;
        } else {
            $num = $num - 1;
        }

        ++$step;
    }

    return $step;
}