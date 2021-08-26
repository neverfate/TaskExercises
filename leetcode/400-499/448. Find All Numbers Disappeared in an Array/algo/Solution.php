<?php

/*

448. Find All Numbers Disappeared in an Array

https://leetcode.com/submissions/detail/543939446/

Given an array nums of n integers where nums[i] is in the range [1, n], return an array of all the integers in the range [1, n] that do not appear in nums.



Example 1:

Input: nums = [4,3,2,7,8,2,3,1]
Output: [5,6]
Example 2:

Input: nums = [1,1]
Output: [2]


Constraints:

n == nums.length
1 <= n <= 105
1 <= nums[i] <= n


Follow up: Could you do it without extra space and in O(n) runtime? You may assume the returned list does not count as extra space.
 */

class Solution
{
    /**
     * @param int[] $nums
     * @return int[]
     */
    function findDisappearedNumbers(array $nums): array
    {
        $a   = [];
        $cnt = count($nums);

        for ($i = 0; $i < $cnt; $i++) {
            $abs = abs($nums[$i]) - 1;

            if ($nums[$abs] > 0) {
                $nums[$abs] = -$nums[$abs];
            }
        }

        for ($i = 0; $i < $cnt; $i++) {
            if ($nums[$i] > 0) {
                $a[] = $i + 1;
            }

        }

        return $a;
    }
}
