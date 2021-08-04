<?php
/*
Runtime: 28 ms, faster than 34.07% of PHP online submissions for Roman to Integer.
Memory Usage: 15.5 MB, less than 95.58% of PHP online submissions for Roman to Integer.
*/
class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    static function romanToInt($s) {
        $ss = str_replace(['CM','CD','XC','XL','IX','IV','M','D','C','L','X','V','I'],[',900,',',400,',',90,',',40,',',9,',',4,',',1000,',',500,',',100,',',50,',',10,',',5,',',1,'],$s);
        return array_sum(array_filter(explode(',', $ss))); 
    }
}

// 測試用例
$test_case = array(
    array("III",3),
    array("IV",4),
    array("IX",9),
    array("LVIII",58),
    array("MCMXCIV",1994),
);

foreach($test_case as $k => $v) {

    $r = Solution::romanToInt($v[0]);
    if ($r == $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}