<?php

/**
 * Is anagram.
 *
 * Description: Given two strings s and t , write a function to determine if t is an anagram of s.
 *
 * Example: Input: s = "anagram", t = "nagaram" Output: true.
 * Problem Link: https://leetcode.com/problems/valid-anagram.
 *
 * @param String $s
 * @param String $t
 * @return Boolean
 */
function isAnagram($s, $t)
{
    $sLength = strlen($s);
    $tLength = strlen($t);

    if ($sLength !== $tLength) {
        return false;
    }

    $sWeight = [];
    $tWeight = [];

    for ($i = 0; $i < $sLength; $i++) {
        $sWeight[ord($s[$i])]++;
    }

    for ($i = 0; $i < $tLength; $i++) {
        $tWeight[ord($t[$i])]++;
    }

    for ($i = 0; $i < 256; $i++) {
        if ($sWeight[$i] != $tWeight[$i]) {
            return false;
        }
    }

    return true;
}