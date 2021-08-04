<?php
/*
Runtime: 28 ms, faster than 34.07% of PHP online submissions for Roman to Integer.
Memory Usage: 15.5 MB, less than 95.58% of PHP online submissions for Roman to Integer.
*/
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    static function longestCommonPrefix($strs) {
        $k = 0;
        $pos = 0;
        $str = "";
     
        while (true) {
            if (count($strs) === 0 || !$strs[$pos][$k]) {
                return $str;
            }
     
            $next = $strs[$pos][$k];
     
            for ($j = 0; $j < count($strs); $j++) {
                if ($strs[$j][$k] != $next) {
                    return $str;
                }
            }
     
            $k++;
            $str = $str . $next;
        }
    }
}

// 測試用例
$test_case = array(
    array(["flower","flow","flight"],"fl"),
    array(["dog","racecar","car"],""),
);

foreach($test_case as $k => $v) {

    $r = Solution::longestCommonPrefix($v[0]);
    if ($r == $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}