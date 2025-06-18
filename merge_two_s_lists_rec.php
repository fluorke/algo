<?php

class ListNode
{
    public $val;
    public $next;
    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

$node = new ListNode();
var_dump($node);

class LinkedList
{
    public $head;
    public function __construct()
    {
        $this->head = null;
    }

    public function append($val)
    {
        if ($this->head === null) {
            $this->head = new ListNode($val);
            return;
        }
        $this->_append($val, $this->head);
    }

    private function _append($val, $curr)
    {
        if ($curr->next === null) {
            $curr->next = new ListNode($val);
            return;
        }
        $this->_append($val, $curr->next);
    }

    public function compare()
    {
        if ($this->head !== null) {
            $curr = $this->head;
        }
        if ($curr->next !== null) {
            $next = $curr->next;
            echo max($curr->val, $next->val) . ' is bigger' . PHP_EOL;
            $this->_compare($curr->next, $next);
        }
    }

    public function _compare($curr, $next)
    {
        if ($curr->next !== null) {
            $next = $curr->next;
            echo max($curr->val, $next->val) . ' is bigger' . PHP_EOL;
            $this->_compare($curr->next, $next);
        }
    }

    public function compare_outer($outer_node)
    {
        if ($this->head !== null && $outer_node !== null) {
            $this->append($outer_node->val);
        }
        if ($outer_node->next !== null)
            $this->_compare_outer($outer_node->next);
    }
    public function _compare_outer($outer_node = null)
    {
        $this->append($outer_node->val);
        if ($outer_node->next !== null)
            $this->_compare_outer($outer_node->next);
    }

    public function outer_append($outer_node = null)
    {
        if ($this->head !== null && $this->head->val !== null) {
            $head = $this->head;
            $curr = $head;
        }

        if ($curr?->next !== null && $outer_node === null) {
            $this->_outer_append($curr->next, $head, $outer_node = null);
        }

        //move, outer continue
        if ($curr?->next !== null && $outer_node !== null) {
            $this->_outer_append($curr->next, $head, $outer_node);
        }

        if ($curr->next === null && $outer_node->next !== null) {
            $new_node = new ListNode();
            $new_node->val = $outer_node->val;
            $new_node->next = $outer_node->next;
            $head->next = $new_node;
            return;
        }

        if ($curr->next === null && $outer_node->next === null) {
            $new_node = new ListNode();
            $new_node->val = $outer_node->val;
            $new_node->next = null;
            $head->next = $new_node;
            return;
        }

    }
    public function _outer_append($curr, $head, $outer_node = null)
    {
        echo " curr val : $curr->val " . PHP_EOL;
        echo " outer val : $outer_node->val " . PHP_EOL;
        if ($outer_node !== null) {
            // echo " l2 val : $outer_node->val " .PHP_EOL;
            // echo " curr val : $curr->val " .PHP_EOL;
            if ($outer_node->val <= $curr->val) {
                $new_node = new ListNode();
                $new_node->val = $outer_node->val;
                $new_node->next = $curr;
                $head->next = $new_node;

                echo " curr val : $curr->val " . PHP_EOL;
                echo " outer val : $outer_node->val " . PHP_EOL;
                if ($curr->next !== null && $outer_node->next !== null) {
                    $this->_outer_append($new_node->next, $head->next, $outer_node->next);
                }
                ;

                if ($curr->next === null && $outer_node->next !== null) {
                    $this->_outer_append($new_node, $head, $outer_node->next);
                }
            } else {
                if ($curr->next !== null) {
                    $this->_outer_append($curr->next, $head->next, $outer_node);
                }
                if ($curr->next === null && $outer_node->next !== null) {
                    //$this->_outer_append($curr, $head, $outer_node->next);
                    $curr->next = $outer_node;
                }
            }
        }

    }

}


//case: 1
// $list = new LinkedList();
// $list->append(1);
// $list->append(2);
// $list->append(4);
// $list2 = new LinkedList();
// $list2->append(1);
// $list2->append(3);
// $list2->append(4);


//case: 2
// $list = new LinkedList();
// $list2 = new LinkedList();
// $list2->append(0);

//case: 3
// $list = new LinkedList();
// $list->append(2);

// $list2 = new LinkedList();
// $list2->append(1);

//case: 4
// $list = new LinkedList();
// $list->append(5);
// $list2 = new LinkedList();
// $list2->append(1);
// $list2->append(2);
// $list2->append(4);

//case: 5
$list = new LinkedList();
$list->append(-9);
$list->append(3);
$list2 = new LinkedList();
$list2->append(5);
$list2->append(7);




if ($list->head === null)
    return $list2;
if ($list2->head->val === null)
    return $list1;

if ($list->head->val <= $list2->head->val) {
    $list->outer_append($list2->head);
    var_dump($list->head);
} else {
    $list2->outer_append($list->head);
    var_dump($list2->head);
}

