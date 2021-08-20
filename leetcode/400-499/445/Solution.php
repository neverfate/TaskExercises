<?php

/*
445. Add Two Numbers II

https://leetcode.com/submissions/detail/533129415/

You are given two non-empty linked lists representing two non-negative integers. The most significant digit comes first and each of their nodes contains a single digit. Add the two numbers and return the sum as a linked list.

You may assume the two numbers do not contain any leading zero, except the number 0 itself.



Example 1:


Input: l1 = [7,2,4,3], l2 = [5,6,4]
Output: [7,8,0,7]
Example 2:

Input: l1 = [2,4,3], l2 = [5,6,4]
Output: [8,0,7]
Example 3:

Input: l1 = [0], l2 = [0]
Output: [0]


Constraints:

The number of nodes in each linked list is in the range [1, 100].
0 <= Node.val <= 9
It is guaranteed that the list represents a number that does not have leading zeros.

 */

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $a1 = $a2 = [];

        $l = $l1;
        do {
            $a1[] = $l->val;
        } while ($l = $l->next);

        $l = $l2;
        do {
            $a2[] = $l->val;
        } while ($l = $l->next);

        while (count($a1) != count($a2)) {
            if (count($a1) > count($a2)) {
                array_unshift($a2, 0);
            } else {
                array_unshift($a1, 0);
            }
        }

        for ($i = count($a1) - 1; $i > -1; $i--) {
            $a1[$i] += $a2[$i];

            if ($a1[$i] >= 10) {
                $a1[$i] -= 10;

                if (!isset($a1[$i - 1])) {
                    array_unshift($a1, 0);
                }

                if ($i - 1 < 0) {
                    $a1[$i]++;
                } else {
                    $a1[$i - 1]++;
                }
            }
        }

        $next = null;
        for ($i = count($a1) - 1; $i > -1; $i--) {
            $next = new ListNode($a1[$i], $next);
        }

        return $next;
    }
}
