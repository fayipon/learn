<?php
/*
26. Remove Duplicates from Sorted Array
Difficuity : Easy

https://leetcode.com/problems/remove-duplicates-from-sorted-array/

Runtime: 28 ms, faster than 53.93% of PHP online submissions for Remove Duplicates from Sorted Array.
Memory Usage: 17.7 MB, less than 53.14% of PHP online submissions for Remove Duplicates from Sorted Array.

這題 簡單說
在php裡, 使用了 &$nums 
執行了removeDuplicates($nums) 後
$nums 值會跟著變動

然後我們要返回指針pos, 來標計第N位後的位數是無意義的

*/

class Solution {

    /**
    * @param Integer[] $nums
    * @return Integer
    */
    static function removeDuplicates(&$nums) {
        
        if ($nums == null) return 0;

        $i = 0;
        for ($j=1;$j < count($nums);$j++) {
            if ($nums[$j] != $nums[$i]) {
                $i++;
                $nums[$i] = $nums[$j];
            }
        }
        return $i+1;
    }
}

// 測試用例
// 這題用例無效
$test_case = array(array([1,1,2], [1,2,'_']),array([0,0,1,1,1,2,2,3,3,4], [0,1,2,3,4,'_','_','_','_','_']),
);

foreach($test_case as $k => $v) {

    $r = Solution::removeDuplicates($v[0]);
    if ($r === $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
