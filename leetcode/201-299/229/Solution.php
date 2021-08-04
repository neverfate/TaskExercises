<?php

/*
229. Majority Element II

https://leetcode.com/submissions/detail/532729561/

Given an integer array of size n, find all elements that appear more than ⌊ n/3 ⌋ times.

Example 1:
Input: nums = [3,2,3]
Output: [3]

Example 2:
Input: nums = [1]
Output: [1]


Example 3:
Input: nums = [1,2]
Output: [1,2]

Constraints:
1 <= nums.length <= 5 * 104
-109 <= nums[i] <= 109

*/

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function majorityElement($nums)
    {
        $out   =
        $check = [];

        $limit = count($nums) / 3;

        foreach ($nums as $num) {
            if (!isset($check[$num]) > $limit) {
                $check[$num] = 1;
            } else {
                $check[$num]++;
            }
        }

        foreach ($check as $num => $cnt) {
            if ($cnt > $limit) {
                $out[] = $num;
            }
        }

        return $out;
    }
}
