<?php

/*

24. Swap Nodes in Pairs

https://leetcode.com/submissions/detail/544482387/

Given a linked list, swap every two adjacent nodes and return its head. You must solve the problem without modifying the values in the list's nodes (i.e., only nodes themselves may be changed.)



Example 1:


Input: head = [1,2,3,4]
Output: [2,1,4,3]
Example 2:

Input: head = []
Output: []
Example 3:

Input: head = [1]
Output: [1]


Constraints:

The number of nodes in the list is in the range [0, 100].
0 <= Node.val <= 100
 */

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null)
    {
        $this->val  = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ?ListNode $head
     * @return ListNode
     */
    function swapPairs(?ListNode $head): ListNode
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $next = $this->swapPairs($head->next->next);

        $t          = $head;
        $head       = $head->next;
        $head->next = $t;

        $head->next->next = $next;

        return $head;
    }
}
