<?php

/*

905. Sort Array By Parity

https://leetcode.com/submissions/detail/542876878/

Given an integer array nums, move all the even integers at the beginning of the array followed by all the odd integers.

Return any array that satisfies this condition.



Example 1:

Input: nums = [3,1,2,4]
Output: [2,4,3,1]
Explanation: The outputs [4,2,3,1], [2,4,1,3], and [4,2,1,3] would also be accepted.
Example 2:

Input: nums = [0]
Output: [0]


Constraints:

1 <= nums.length <= 5000
0 <= nums[i] <= 5000
 */

class Solution
{
    /**
     * @param int[] $nums
     * @return int[]
     */
    function sortArrayByParity(array $nums): array
    {
        $i = 0;
        for ($j = $i + 1; $j < count($nums); $j++) {
            if ($nums[$i] % 2 != 0) {
                if ($nums[$j] % 2 == 0) {

                    $nums[$i] ^= $nums[$j];
                    $nums[$j] ^= $nums[$i];
                    $nums[$i] ^= $nums[$j];

                    $i++;
                }
            } else {
                $i++;
            }
        }

        return $nums;
    }
}
