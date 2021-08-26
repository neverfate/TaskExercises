<?php

/*

448. Find All Numbers Disappeared in an Array

https://leetcode.com/submissions/detail/543925628/

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
        $a =
        $h = [];

        foreach ($nums as $v) {
            $h[$v] = true;
        }

        for ($i = 1; $i <= count($nums); $i++) {
            if (!isset($h[$i])) {
                $a[] = $i;
            }
        }

        return $a;
    }
}
