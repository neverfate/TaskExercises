<?php

/*

485. Max Consecutive Ones

https://leetcode.com/submissions/detail/541391328/

Given a binary array nums, return the maximum number of consecutive 1's in the array.



Example 1:

Input: nums = [1,1,0,1,1,1]
Output: 3
Explanation: The first two digits or the last three digits are consecutive 1s. The maximum number of consecutive 1s is 3.
Example 2:

Input: nums = [1,0,1,1,0,1]
Output: 2


Constraints:

1 <= nums.length <= 105
nums[i] is either 0 or 1.
 */

class Solution
{
    /**
     * @param int[] $nums
     * @return int
     */
    function findMaxConsecutiveOnes(array $nums): int
    {
        $len =
        $max = 0;

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 1) {
                $len++;
            } else {
                if ($len > $max) {
                    $max = $len;
                }

                $len = 0;
            }
        }

        return $len > $max ? $len : $max;
    }
}
