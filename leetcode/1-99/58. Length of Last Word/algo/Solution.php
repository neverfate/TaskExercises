<?php

/*

58. Length of Last Word

https://leetcode.com/submissions/detail/541345848/

Given a string s consisting of some words separated by some number of spaces, return the length of the last word in the string.

A word is a maximal substring consisting of non-space characters only.



Example 1:

Input: s = "Hello World"
Output: 5
Explanation: The last word is "World" with length 5.
Example 2:

Input: s = "   fly me   to   the moon  "
Output: 4
Explanation: The last word is "moon" with length 4.
Example 3:

Input: s = "luffy is still joyboy"
Output: 6
Explanation: The last word is "joyboy" with length 6.


Constraints:

1 <= s.length <= 104
s consists of only English letters and spaces ' '.
There will be at least one word in s.
 */

class Solution
{
    /**
     * @param string $s
     * @return int
     */
    function lengthOfLastWord(string $s): int
    {
        $len  = 0;
        $find = false;

        for ($i = strlen($s) - 1; $i >= 0; $i--) {
            if ($s[$i] != ' ') {
                $find = true;
            }

            if ($find) {
                if ($s[$i] == ' ') {
                    break;
                }

                $len++;
            }
        }

        return $len;
    }
}
