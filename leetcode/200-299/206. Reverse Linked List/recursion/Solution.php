<?php

/*

206. Reverse Linked List

https://leetcode.com/submissions/detail/544505826/

Given the head of a singly linked list, reverse the list, and return the reversed list.



Example 1:


Input: head = [1,2,3,4,5]
Output: [5,4,3,2,1]
Example 2:


Input: head = [1,2]
Output: [2,1]
Example 3:

Input: head = []
Output: []


Constraints:

The number of nodes in the list is the range [0, 5000].
-5000 <= Node.val <= 5000


Follow up: A linked list can be reversed either iteratively or recursively. Could you implement both?
 */

class ListNode
{
    public $val  = 0;
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
     * @param ?ListNode $head
     * @param ?ListNode $newHead
     * @return ?ListNode
     */
    function reverseList(?ListNode $head, ?ListNode $newHead = null): ?ListNode
    {
        if (!$head){
            return $newHead;
        }

        $t          = $head->next;
        $head->next = $newHead;
        $newHead    = $head;
        $head       = $t;

        return $this->reverseList($head, $newHead);
    }
}
