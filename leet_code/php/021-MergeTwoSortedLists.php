<?php
/*
Runtime: 8 ms, faster than 76.30% of PHP online submissions for Merge Two Sorted Lists.
Memory Usage: 15.9 MB, less than 5.93% of PHP online submissions for Merge Two Sorted Lists.

又是ListNode系統
將二組ListNode , 合併後, 並做順序排序
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    static function mergeTwoLists($l1, $l2) {
        
        $tmp_l1 = array();
        self::convertArray($tmp_l1,$l1);

        $tmp_l2 = array();
        self::convertArray($tmp_l2,$l2);

        $reponse = array();
        $reponse = array_merge($tmp_l1,$tmp_l2);

        sort($reponse);

        return self::convertListNode($reponse);
    }

    
    // 遞迴, 將ListNode轉成Array
    static private function convertArray(&$array,$val) {
        $array[] = $val->val;
        if ($val->next !== null) {
        self::convertArray($array,$val->next);
        }
    }

    // 將Array 轉換成ListNode
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
    array(
        '{"val":1,"next":{"val":2,"next":{"val":4,"next":null}}}',
        '{"val":1,"next":{"val":3,"next":{"val":4,"next":null}}}',
        '{"val":1,"next":{"val":1,"next":{"val":2,"next":{"val":3,"next":{"val":4,"next":{"val":4,"next":null}}}}}}',
    ),

);

foreach($test_case as $k => $v) {

    $l1 = json_decode($v[0]);
    $l2 = json_decode($v[1]);
    $reponse = json_decode($v[2]);
    
    $r = Solution::mergeTwoLists($l1,$l2);
    if ($r === $reponse) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
