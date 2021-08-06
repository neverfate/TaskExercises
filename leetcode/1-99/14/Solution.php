<?php

/*
14. Longest Common Prefix

https://leetcode.com/submissions/detail/534162982/

Write a function to find the longest common prefix string amongst an array of strings.

If there is no common prefix, return an empty string "".

Example 1:

Input: strs = ["flower","flow","flight"]
Output: "fl"
Example 2:

Input: strs = ["dog","racecar","car"]
Output: ""
Explanation: There is no common prefix among the input strings.


Constraints:

1 <= strs.length <= 200
0 <= strs[i].length <= 200
strs[i] consists of only lower-case English letters.
 */

class Solution
{
    /**
     * @param String[] $strs
     * @return string
     */
    function longestCommonPrefix(array $strs): string
    {
        $cnt = count($strs);

        if ($cnt == 1) {
            return $strs[0];
        }

        $maxLen =
        $j      = 0;
        $flag   = false;

        while (true) {
            for ($i = 1; $i < $cnt; $i++) {
                if (!isset($strs[0][$j]) || $strs[0][$j] != $strs[$i][$j]) {
                    $flag = true;
                    break;
                }
            }

            if ($flag) {
                break;
            }

            if ($i == $cnt) {
                $maxLen++;
            }

            $j++;
        }

        return substr($strs[0], 0, $maxLen);
    }
}
