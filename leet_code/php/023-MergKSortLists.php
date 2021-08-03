<?php
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
     * @param ListNode[] $lists
     * @return ListNode
     */

    static function mergeKLists($lists) {
        
        $tmp = array();
        foreach ($lists as $k => $v) {
            if ($v->val !== null) {
                $tmp[] = $v->val;
                self::margeArray($tmp,$v->next);
            }
        } 

        sort($tmp,SORT_NUMERIC);
        $tmp = self::convertListNode($tmp);
        return $tmp;
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

    // TEST CASE
  //   $json = '[]';
  //   $json = '[{}]';
  //   $json = '[{"val":1,"next":null}]';
    $json = '[{"val":1,"next":{"val":4,"next":{"val":5,"next":null}}},{"val":1,"next":{"val":3,"next":{"val":4,"next":null}}},{"val":2,"next":{"val":6,"next":null}}]';

//    $json = '[{"val":0,"next":{"val":2,"next":{"val":5,"next":null}}}]';
//    $json = '[{"val":1,"next":null},{"val":0,"next":null}]';

    $lists = json_decode($json);
    $return = Solution::mergeKLists($lists);
    var_dump(json_encode($return));


?>

