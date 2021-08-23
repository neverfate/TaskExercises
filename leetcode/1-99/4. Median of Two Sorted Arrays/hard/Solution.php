<?php

/*
4. Median of Two Sorted Arrays

https://leetcode.com/submissions/detail/533642852/

Given two sorted arrays nums1 and nums2 of size m and n respectively, return the median of the two sorted arrays.

The overall run time complexity should be O(log (m+n)).

Example 1:

Input: nums1 = [1,3], nums2 = [2]
Output: 2.00000
Explanation: merged array = [1,2,3] and median is 2.
Example 2:

Input: nums1 = [1,2], nums2 = [3,4]
Output: 2.50000
Explanation: merged array = [1,2,3,4] and median is (2 + 3) / 2 = 2.5.
Example 3:

Input: nums1 = [0,0], nums2 = [0,0]
Output: 0.00000
Example 4:

Input: nums1 = [], nums2 = [1]
Output: 1.00000
Example 5:

Input: nums1 = [2], nums2 = []
Output: 2.00000


Constraints:

nums1.length == m
nums2.length == n
0 <= m <= 1000
0 <= n <= 1000
1 <= m + n <= 2000
-106 <= nums1[i], nums2[i] <= 106

 */

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return float
     */
    function findMedianSortedArrays(array $nums1, array $nums2): float
    {
        $l =
        $r =

        $leftNum  =
        $rightNum = 0;

        $median = (count($nums1) + count($nums2)) / 2;
        $isEven = (int)$median == $median;
        $median = (int)$median;

        while ($l + $r <= $median) {
            if ($isEven) {
                $leftNum = $rightNum;
            }

            if (isset($nums1[$l]) && isset($nums2[$r]) && $nums1[$l] <= $nums2[$r]) {

                $rightNum = $nums1[$l++];

            } elseif (isset($nums2[$r])) {

                $rightNum = $nums2[$r++];

            } elseif (isset($nums1[$l])) {

                $rightNum = $nums1[$l++];

            } else {
                break;
            }
        }

        if ($isEven) {
            return ($leftNum + $rightNum) / 2;
        } else {
            return $rightNum;
        }
    }
}
