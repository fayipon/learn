<?php
/*
Runtime: 36 ms, faster than 24.80% of PHP online submissions for Valid Parentheses.
Memory Usage: 15.8 MB, less than 53.15% of PHP online submissions for Valid Parentheses.

這題很久以前做過， 檢查括號是否合法, 有[就會對應] , 且要對照

邏輯

利用while 與 str_replace 來實現
當出現 {} , [] , () , 則替換成 空白
false =>上次字串長度 = 本次字串長度  
true => 字串為空

*/
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    static function isValid($s) {
    
        if (strlen($s)%2 !== 0) {
            return false;
        }
        
        $search = array("()","[]","{}");
        while (1) {
            $before_leng = strlen($s);
            $s = str_replace($search, "", $s);
            $after_leng = strlen($s);

            if ($before_leng == $after_leng) {
                return false;
            }

            if ($after_leng == 0) {
                return true;
            }
        }
    }
}


// 測試用例
$test_case = array(
    array("()",true),
    array("()[]{}",true),
    array("(]",false),
    array("([)]",false),
    array("{[]}",true),
    array("(([]){})",true),
    array("{}([{}{}][])[{}]",true),

);

foreach($test_case as $k => $v) {

    $r = Solution::isValid($v[0]);
    if ($r === $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
