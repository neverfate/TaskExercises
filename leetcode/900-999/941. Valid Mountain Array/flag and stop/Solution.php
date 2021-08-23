<?php

/*

941. Valid Mountain Array

https://leetcode.com/submissions/detail/542815302/

Given an array of integers arr, return true if and only if it is a valid mountain array.

Recall that arr is a mountain array if and only if:

arr.length >= 3
There exists some i with 0 < i < arr.length - 1 such that:
arr[0] < arr[1] < ... < arr[i - 1] < arr[i]
arr[i] > arr[i + 1] > ... > arr[arr.length - 1]



Example 1:

Input: arr = [2,1]
Output: false
Example 2:

Input: arr = [3,5,5]
Output: false
Example 3:

Input: arr = [0,3,2,1]
Output: true


Constraints:

1 <= arr.length <= 104
0 <= arr[i] <= 104
 */

class Solution
{
    /**
     * @param int[] $arr
     * @return bool
     */
    function validMountainArray(array $arr): bool
    {
        $cnt = count($arr);

        if ($cnt < 3) {
            return false;
        }

        if ($arr[0] >= $arr[1]) {
            return false;
        }

        $followUp = true;
        for ($i = 1; $i < $cnt - 1; $i++) {

            if ($followUp) {
                if ($arr[$i + 1] <= $arr[$i]) {
                    $followUp = false;
                }
            } else {
                if ($arr[$i - 1] <= $arr[$i]) {
                    return false;
                }
            }

        }

        if ($arr[$i - 1] <= $arr[$i]) {
            return false;
        }

        return true;
    }
}
