<?php

/*

118. Pascal's Triangle

https://leetcode.com/submissions/detail/544519917/

Given an integer numRows, return the first numRows of Pascal's triangle.

In Pascal's triangle, each number is the sum of the two numbers directly above it as shown:




Example 1:

Input: numRows = 5
Output: [[1],[1,1],[1,2,1],[1,3,3,1],[1,4,6,4,1]]
Example 2:

Input: numRows = 1
Output: [[1]]


Constraints:

1 <= numRows <= 30
 */

class Solution
{
    /**
     * @param int $numRows
     * @return int[][]
     */
    function generate(int $numRows): array
    {
        $a = [[1]];
        $this->getLine(1, $numRows, $a);
        return $a;
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
