<?php

/*
7. Reverse Integer

https://leetcode.com/submissions/detail/533687152/

Given a signed 32-bit integer x, return x with its digits reversed. If reversing x causes the value to go outside the signed 32-bit integer range [-231, 231 - 1], then return 0.

Assume the environment does not allow you to store 64-bit integers (signed or unsigned).

Example 1:

Input: x = 123
Output: 321
Example 2:

Input: x = -123
Output: -321
Example 3:

Input: x = 120
Output: 21
Example 4:

Input: x = 0
Output: 0


Constraints:

-231 <= x <= 231 - 1

 */

class Solution
{
    /**
     * @param Integer $x
     * @return int
     */
    function reverse(int $x): int
    {
        $y = (int)implode(
            '',
            array_reverse(
                str_split(
                    abs($x)
                )
            )
        );

        if ($y > 2147483647 /*PHP_INT_MAX*/) {
            return 0;
        }

        return $x < 0 ? -$y : $y;
    }
}
