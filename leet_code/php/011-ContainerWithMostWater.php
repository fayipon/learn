<?php

/*
Runtime: 280 ms, faster than 15.56% of PHP online submissions for Container With Most Water.
Memory Usage: 28.2 MB, less than 42.22% of PHP online submissions for Container With Most Water.
*/
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    static function maxArea($height) {
        
        $max_area = 0;
        $left = 0; 
        $right = count($height)-1; 

        while ($left < $right) {
            $max_area = max([$max_area,min([$height[$left], $height[$right]])*($right-$left)]);
            if ($height[$left] < $height[$right]) {
                $left++;
            } else {
                $right--;
            }
        }
        
        return $max_area;
    }
}

// 測試用例
$test_case = array(
    array([1,8,6,2,5,4,8,3,7],49),
    array([4,3,2,1,4],16),
    array([1,2,1],2),
);

foreach($test_case as $k => $v) {

    $r = Solution::maxArea($v[0]);
    if ($r == $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
