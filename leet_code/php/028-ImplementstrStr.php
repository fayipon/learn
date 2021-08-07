<?php
/*
28.  Implement strStr()
Difficuity : Easy

Runtime: 72 ms, faster than 26.87% of PHP online submissions for Implement strStr().
Memory Usage: 15.6 MB, less than 97.76% of PHP online submissions for Implement strStr().

還是easy題

用strpos方法來做而已
strpos沒搜到符合字串時, 會返回false , 這時你就設個-1給他, 搞定
*/
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    static function strStr($haystack, $needle) {
        if ($needle == "") return 0;

        $return = strpos($haystack,$needle);
        if ($return === false) $return = -1;
        return $return;
    }
}

// 測試用例
$test_case = array(
    array("hello","ll",2),
    array("aaaaa","bba",-1),
    array("","",0),
);

foreach($test_case as $k => $v) {

    $r = Solution::strStr($v[0],$v[1]);
    print($r." >>> ");
    if ($r == $v[2]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}