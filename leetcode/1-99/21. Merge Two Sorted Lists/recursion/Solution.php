<?php

/*
21. Merge Two Sorted Lists

https://leetcode.com/submissions/detail/534588404/

Merge two sorted linked lists and return it as a sorted list. The list should be made by splicing together the nodes of the first two lists.

Example 1:

Input: l1 = [1,2,4], l2 = [1,3,4]
Output: [1,1,2,3,4,4]

Example 2:

Input: l1 = [], l2 = []
Output: []

Example 3:

Input: l1 = [], l2 = [0]
Output: [0]


Constraints:

The number of nodes in both lists is in the range [0, 50].
-100 <= Node.val <= 100
Both l1 and l2 are sorted in non-decreasing order.
    */

use JetBrains\PhpStorm\Pure;


//Definition for a singly-linked list.
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ?ListNode $l1
     * @param ?ListNode $l2
     * @return ?ListNode
     */
    function mergeTwoLists(?ListNode $l1, ?ListNode $l2): ?ListNode
    {
        if (!$l1) {
            return $l2;
        }

        if (!$l2) {
            return $l1;
        }

        if ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}
