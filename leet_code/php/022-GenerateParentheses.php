<?php
/*
Runtime: 36 ms, faster than 24.80% of PHP online submissions for Valid Parentheses.
Memory Usage: 15.8 MB, less than 53.15% of PHP online submissions for Valid Parentheses.

列出所有括號的組合 , 步驟最多到8步

邏輯

step 1
    ''   =>  '[]'

step 2  (2的一次方)
    '[]'   =>  '()[]'
    '[]'   =>  '[()]'
    '[]'   =>  '[]()'   // 
    
step 3 (3的2次方)
    '[][]'   =>  '()[][]'
    '[][]'   =>  '[()][]'
    '[][]'   =>  '[]()[]'  // 
    '[][]'   =>  '[][()]'
    '[][]'   =>  '[][]()'  // 

    '[[]]'   =>  '()[[]]'  // 
    '[[]]'   =>  '[()[]]'
    '[[]]'   =>  '[[()]]'
    '[[]]'   =>  '[[]()]'  // 
    '[[]]'   =>  '[[]]()'  // 

step 4 (4的3次方)
    '[][][]'   =>  '()[][][]'
    '[][][]'   =>  '[()][][]'
    '[][][]'   =>  '[]()[][]'
    '[][][]'   =>  '[][()][]'
    '[][][]'   =>  '[][]()[]'
    '[][][]'   =>  '[][][()]'
    '[][][]'   =>  '[][][]()'
    
    '[[]][]'   =>  '()[[]][]'
    '[[]][]'   =>  '[()[]][]'
    '[[]][]'   =>  '[[()]][]'
    '[[]][]'   =>  '[[]()][]'
    '[[]][]'   =>  '[[]]()[]'
    '[[]][]'   =>  '[[]][()]'
    '[[]][]'   =>  '[[]][]()'

    '[][[]]'   =>  '()[][[]]'
    '[][[]]'   =>  '[()][[]]'
    '[][[]]'   =>  '[]()[[]]'
    '[][[]]'   =>  '[][()[]]'
    '[][[]]'   =>  '[][[()]]'
    '[][[]]'   =>  '[][[]()]'
    '[][[]]'   =>  '[][[]]()'

    '[[][]]'   =>  '()[[][]]'
    '[[][]]'   =>  '[()[][]]'
    '[[][]]'   =>  '[[()][]]'
    '[[][]]'   =>  '[[]()[]]'
    '[[][]]'   =>  '[[][()]]'
    '[[][]]'   =>  '[[][]()]'
    '[[][]]'   =>  '[[][]]()'

    '[[[]]]'   =>  '()[[[]]]'
    '[[[]]]'   =>  '[()[[]]]'
    '[[[]]]'   =>  '[[()[]]]'
    '[[[]]]'   =>  '[[[()]]]'
    '[[[]]]'   =>  '[[[]()]]'
    '[[[]]]'   =>  '[[[]]()]'
    '[[[]]]'   =>  '[[[]]]()'

    題目的最大值為n = 8 
    8的7次方也就是 262,144 種組合

*/
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    static function generateParenthesis($n) {
    
        $tmp = array(
            "()"
        );
        
        $tmp = self::generate($n-1, $tmp);

        print_r($tmp) . "\n";
    }

    static function generate($n, $array) {

        if ($n == 0) {
            return $array;
        }

        $tmp = array();
        
        foreach($array as $k => $v) {
            for($i=0;$i<strlen($v);$i++) {
                $tmp[] = self::str_insert($array[$k],$i,"()");
            }
        }

        $array = array_unique($tmp);
        $array = array_values($array);

        $n--;
        return self::generate($n,$array);
        
    }

    static function str_insert($str,$i,$substr) {
        $start = substr($str,0,$i);
        $end = substr($str,$i);
        $str = ($start . $substr . $end);
        return $str;
    }
}


// 測試用例
$test_case = array(
    array("3",true),

);

foreach($test_case as $k => $v) {

    $r = Solution::generateParenthesis($v[0]);
    if ($r === $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
