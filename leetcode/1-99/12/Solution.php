<?php

/*
12. Integer to Roman

https://leetcode.com/submissions/detail/534893381/

Roman numerals are represented by seven different symbols: I, V, X, L, C, D and M.

Symbol       Value
I             1
V             5
X             10
L             50
C             100
D             500
M             1000
For example, 2 is written as II in Roman numeral, just two one's added together. 12 is written as XII, which is simply X + II. The number 27 is written as XXVII, which is XX + V + II.

Roman numerals are usually written largest to smallest from left to right. However, the numeral for four is not IIII. Instead, the number four is written as IV. Because the one is before the five we subtract it making four. The same principle applies to the number nine, which is written as IX. There are six instances where subtraction is used:

I can be placed before V (5) and X (10) to make 4 and 9.
X can be placed before L (50) and C (100) to make 40 and 90.
C can be placed before D (500) and M (1000) to make 400 and 900.
Given an integer, convert it to a roman numeral.



Example 1:

Input: num = 3
Output: "III"
Example 2:

Input: num = 4
Output: "IV"
Example 3:

Input: num = 9
Output: "IX"
Example 4:

Input: num = 58
Output: "LVIII"
Explanation: L = 50, V = 5, III = 3.
Example 5:

Input: num = 1994
Output: "MCMXCIV"
Explanation: M = 1000, CM = 900, XC = 90 and IV = 4.


Constraints:

1 <= num <= 3999
*/

class Solution
{
    /**
     * @param int $num
     * @return string
     */
    function intToRoman(int $num): string
    {
        $mapR = ['M', 'D', 'C', 'L', 'X', 'V', 'I'];
        $mapA = [1000, 500, 100, 50, 10, 5, 1];
        $list = [];
        $i    = 0;

        do {
            $roman = $mapR[$i];
            $d     = $mapA[$i];
            $f     = (int)($num / $d);

            if ($f > 0) {
                $list[] = $f <= 3 ? str_repeat($roman, $f) : "$roman{$mapR[$i - 1]}";
                $num -= $f * $d;
                $i = -1;
            } elseif ($num / $d >= 0.9 && (((string)$mapA[$i + 2])[0] == 1) ) {
                $list[] = "{$mapR[$i + 2]}$roman";
                $num -= $d - $mapA[$i + 2];
                $i = -1;
            }

            $i++;
        } while ($num > 0);

        return implode('', $list);
    }
}
