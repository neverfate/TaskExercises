<?php

/*

119. Pascal's Triangle II

https://leetcode.com/submissions/detail/544520964/

Given an integer rowIndex, return the rowIndexth (0-indexed) row of the Pascal's triangle.

In Pascal's triangle, each number is the sum of the two numbers directly above it as shown:




Example 1:

Input: rowIndex = 3
Output: [1,3,3,1]
Example 2:

Input: rowIndex = 0
Output: [1]
Example 3:

Input: rowIndex = 1
Output: [1,1]


Constraints:

0 <= rowIndex <= 33
 */

class Solution
{
    /**
     * @param int $rowIndex
     * @return int[]
     */
    function getRow(int $rowIndex): array
    {
        $a = [[1]];
        $this->getLine(1, $rowIndex + 1, $a);
        return end($a);
    }

    function getLine(int $cur, int $stop, array &$a): void
    {
        if ($cur >= $stop) {
            return;
        }

        $a[$cur] = [1];

        for ($i = 1; $i < $cur; $i++) {
            $a[$cur][] = $a[$cur - 1][$i - 1] + ($a[$cur - 1][$i] ?? 0);
        }

        $a[$cur][] = 1;

        $this->getLine($cur + 1, $stop, $a);
    }
}
