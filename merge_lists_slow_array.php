<?php

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

$list1 = new ListNode();
$list2 = new ListNode();
$list1->val = null;
//$list2->val = null;

function mergeTwoLists($list1, $list2)
{
    $arr1 = [];
    $arr2 = [];
    $c = $list1;
    while ($c->next != null) {
        if ($c->val != null) {
            $arr1[] = $c->val;
        }
        $c = $c->next;
    }

    if ($c->val != null) {
        $arr1[] = $c->val;
    }
    $c = $c->next;

    $c = $list2;
    while ($c->next != null) {
        if ($c->val != null) {
            $arr2[] = $c->val;
        }
        $c = $c->next;
    }

    if ($c->val !== null) {
        $arr2[] = $c->val;
    }
    $c = $c->next;
    var_dump($arr1);
    var_dump($arr2);


    $arr1 = array_filter($arr1, 'is_numeric');
    $arr2 = array_filter($arr2, 'is_numeric');

    $sorted_arr = array_merge($arr1, $arr2);
    sort($sorted_arr);


    $sorted_arr = array_filter($sorted_arr, 'is_numeric');

    var_dump($sorted_arr);
    $head = new ListNode;
    $head->val = null;
    $current = $head;
    for ($i = 0; $i < count($sorted_arr); $i++) {
        $current->val = $sorted_arr[$i];
        if ($i != count($sorted_arr) - 1) {
            $node = new ListNode;
            $current->next = $node;
            $current = $current->next;
        } else {
            $current->next = null;
        }
    }
    return $head;
}

$res = mergeTwoLists($list1, $list2);
echo $res->val;