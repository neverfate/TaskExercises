<?php

/*
20. Valid Parentheses

https://leetcode.com/submissions/detail/534184235/

Given a string s containing just the characters '(', ')', '{', '}', '[' and ']', determine if the input string is valid.

An input string is valid if:

    Open brackets must be closed by the same type of brackets.
Open brackets must be closed in the correct order.

Example 1:

Input: s = "()"
Output: true
Example 2:

Input: s = "()[]{}"
Output: true
Example 3:

Input: s = "(]"
Output: false
Example 4:

Input: s = "([)]"
Output: false
Example 5:

Input: s = "{[]}"
Output: true


Constraints:

1 <= s.length <= 104
s consists of parentheses only '()[]{}'.
*/

class Solution
{
    /**
     * @param String $s
     * @return bool
     */
    function isValid(string $s): bool
    {
        $opens = [];

        $brackets = [
            '(' => ')',
            ')' => 0,
            '{' => '}',
            '}' => 0,
            '[' => ']',
            ']' => 0
        ];

        foreach (str_split($s) as $sym) {
            if (!isset($brackets[$sym])) {
                return false;
            }

            if ($brackets[$sym]) {
                $opens[] = $sym;
            } elseif ($brackets[array_pop($opens)] !== $sym) {
                return false;
            }
        }

        return count($opens) == 0;
    }
}
