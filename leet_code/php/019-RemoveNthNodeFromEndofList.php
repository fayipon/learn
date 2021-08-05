<?php
/*
Runtime: 8 ms, faster than 78.13% of PHP online submissions for Remove Nth Node From End of List.
Memory Usage: 15.7 MB, less than 51.56% of PHP online submissions for Remove Nth Node From End of List.

簡略說，這題就是從nodeLists裡 移除倒數過來的第N個Node
Example 1 :
[1,2,3,4,5] , n=2
所以移除第4個

移除也就只是
將 第三個元素的next , 指向第五個而已

然後做這題之前，我是先做了023-Merg K Sort Lists
所以我基於023 的邏輯來做這題

一般大家解法是乖乖的做NodeList運算
我單純只是想「獨特」一點,不想與網上解答一樣, 所以用不同的解法
所以我全轉成一維array後 再做變更

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
     * @param Integer $n
     * @return ListNode
     */
    static function removeNthFromEnd($head, $n) {

        $tmp = array();
        self::convertArray($tmp,$head);
        
        // remove n 
        unset($tmp[count($tmp)-$n]);

        return self::convertListNode($tmp);
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
