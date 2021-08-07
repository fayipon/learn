<?php
/*
27. Remove Element
Difficuity : Easy

https://leetcode.com/problems/reverse-nodes-in-k-group/

Runtime: 12 ms, faster than 73.33% of PHP online submissions for Reverse Nodes in k-Group.
Memory Usage: 17.2 MB, less than 33.33% of PHP online submissions for Reverse Nodes in k-Group.

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