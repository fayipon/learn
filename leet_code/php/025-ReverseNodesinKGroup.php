<?php
/*
25. Reverse Nodes in k-Group
Difficuity : Hard

https://leetcode.com/problems/reverse-nodes-in-k-group/

Runtime: 12 ms, faster than 73.33% of PHP online submissions for Reverse Nodes in k-Group.
Memory Usage: 17.2 MB, less than 33.33% of PHP online submissions for Reverse Nodes in k-Group.

這題與024 很接近
差別在於22交換變成了 22,33,44,55... 

2 -> 取每2個節點, 與上一個交換
3 -> 每三個節點, 反轉, 123 -> 321
4 -> 每四個節點, 反轉, 1234 -> 4321

由於都是反轉, 基本沒差別, 所以我們就基於024來做修改
以原本遞迴的基礎來實現

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
     * @param Integer $k
     * @return ListNode
     */
    static function reverseKGroup($head, $k) {

        // 如果第k個節點為空, 返回$head
        $if = $head;
        for($i=0;$i<$k;$i++) if ($i > 0) $if = $if->next;
        if ($if == null) return $head;

        /////////////
        
        $swap = array();
        
        $if = $head;
        for($i=0;$i<$k;$i++) {
            if ($i > 0) $if = $if->next;
            $swap[$i] = $if;
        }

        // swap
        for($i=0;$i<$k;$i++) {
            if ($i > 0) {
                $swap[$i]->next = $swap[$i-1];   
            } else {
                $swap[$i]->next = self::reverseKGroup($swap[$k-1]->next,$k);
            } 
        }
        
        return $swap[$k-1];
    }


}

// 測試用例
$test_case = array(
    array(
        '{"val":1,"next":{"val":2,"next":{"val":3,"next":{"val":4,"next":{"val":5,"next":null}}}}}',
        3,
        '{"val":2,"next":{"val":1,"next":{"val":4,"next":{"val":3,"next":{"val":5,"next":null}}}}}'
    ),
    /*
    array(
        '{"val":1,"next":{"val":2,"next":{"val":3,"next":{"val":4,"next":{"val":5,"next":null}}}}}',
        1,
        '{"val":1,"next":{"val":2,"next":{"val":3,"next":{"val":4,"next":{"val":5,"next":null}}}}}'
    ),
    array(
        '{"val":1,"next":null}',
        1,
        '{"val":1,"next":null}'
    ),
    */
);

foreach($test_case as $k => $v) {

    $v1 = json_decode($v[0]);

    $v2 = json_decode($v[2]);

    $r = Solution::reverseKGroup($v1,$v[1]);
    if ($r === $v2) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
