<?php
/*
Runtime: 8 ms, faster than 55.81% of PHP online submissions for Swap Nodes in Pairs.
Memory Usage: 15.8 MB, less than 23.26% of PHP online submissions for Swap Nodes in Pairs.

1,2,3,4
step 1
[0] -> 1,2 [1] -> 3,4
    step 2
    [0]-> 3 [1]-> 4
    >>> 4,3
>>> 2,1,4,3

*/
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    static function swapPairs($head) {
        
        // 如果第一二個節點為空, 返回$head
        if (($head == null) || ($head->next == null)) {
            return $head;
        }

        $first = $head;
        $second = $head->next;

        $first->next = $this->swapPairs($second->next);
        $second->next = $first;
        
        return $second;
    }

    
    static private function margeArray(&$array,$val) {
        //if ($v->val !== null) {
            $array[] = $val->val;
            if ($val->next !== null) {
                self::margeArray($array,$val->next);
            }
       // }
        return $array;
    }

    static private function convertListNode($array) {
        $reversed = array_reverse($array);
        $pos = count($array);
        $tmp = array();
        foreach ($reversed as $k => $v) {
            if ($v === null) {
               continue;
            }
            $obj = new ListNode();
            $obj->val = $v;
            if ($k > 0) {
                $obj->next = @$tmp[$pos];
                unset($tmp[$pos]);
            } else {
                $obj->next = null;
            }

            $tmp[$pos-1] = $obj;

            $pos--;
        }
        $tmp = array_values($tmp);
        return $tmp[0];
    }

}


// 測試用例
$test_case = array(
    array('{"val":1,"next":{"val":2,"next":{"val":3,"next":{"val":4,"next":null}}}}','{"val":2,"next":{"val":1,"next":{"val":4,"next":{"val":3,"next":null}}}}'),
    array([],[]),
    array([1],[1]),

);

foreach($test_case as $k => $v) {

    $r = Solution::swapPairs(json_decode($v[0]));
    if ($r === json_decode($v[1])) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
