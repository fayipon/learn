<?php
/*
27. Remove Element
Difficuity : Easy

https://leetcode.com/problems/remove-element/

Runtime: 4 ms, faster than 91.11% of PHP online submissions for Remove Element.
Memory Usage: 15.7 MB, less than 21.78% of PHP online submissions for Remove Element.

就... 跟026差不多
都是easy題
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    static function removeElement(&$nums, $val) {
        if ($nums == null) return 0;

        $i = 0;

        foreach ($nums as $k => $v) {
            if ($v != $val) {
                $nums[$i] = $v;
                $i ++;
            }
        }
        return $i;
    }
}

// 測試用例
$test_case = array(
    array([3,2,2,3],3,[2,2]),
    array([0,1,2,2,3,0,4,2],2,[0,1,4,0,3]),
    array([0,1,2,2,3,0,4,2],2,[0,1,4,0,3]),
);

foreach($test_case as $k => $v) {

    $nums = $v[0];
    $r = Solution::removeElement($nums,$v[1]);
    print($r." >>> ");
    if ($nums == $v[2]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}