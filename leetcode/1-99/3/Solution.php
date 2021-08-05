<?php
/*
3. Longest Substring Without Repeating Characters

https://leetcode.com/submissions/detail/533677367/

Given a string s, find the length of the longest substring without repeating characters.

Example 1:

Input: s = "abcabcbb"
Output: 3
Explanation: The answer is "abc", with the length of 3.
Example 2:

Input: s = "bbbbb"
Output: 1
Explanation: The answer is "b", with the length of 1.
Example 3:

Input: s = "pwwkew"
Output: 3
Explanation: The answer is "wke", with the length of 3.
Notice that the answer must be a substring, "pwke" is a subsequence and not a substring.
Example 4:

Input: s = ""
Output: 0


Constraints:

0 <= s.length <= 5 * 104
s consists of English letters, digits, symbols and spaces.
*/

class Solution
{
    /**
     * @param string $s
     * @return int
     */
    function lengthOfLongestSubstring(string $s): int
    {
        $start =
        $len   = 0;
        $map   = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $letter = $s[$i];

            if (isset($map[$letter])) {
                $start = max($start, $map[$letter] + 1);
            }

            $map[$letter] = $i;
            $len = max($len, $i - $start + 1);
        }

        return $len;
    }
}
