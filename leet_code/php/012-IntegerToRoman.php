<?php
/*
Runtime: 32 ms, faster than 39.77% of PHP online submissions for Integer to Roman.
Memory Usage: 15.5 MB, less than 94.32% of PHP online submissions for Integer to Roman.
*/
class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    static function intToRoman($num) {
        $n = intval($num); 
        $res = ''; 

        $roman = array( 
            'M'  => 1000, 
            'CM' => 900, 
            'D'  => 500, 
            'CD' => 400, 
            'C'  => 100, 
            'XC' => 90, 
            'L'  => 50, 
            'XL' => 40, 
            'X'  => 10, 
            'IX' => 9, 
            'V'  => 5, 
            'IV' => 4, 
            'I'  => 1); 
    
        foreach ($roman as $k => $v) {   
            $matches = intval($n / $v); 
            $res .= str_repeat($k, $matches); 
            $n = $n % $v; 
        } 
        return $res; 
    }
}

// 測試用例
$test_case = array(
    array(3,"III"),
    array(4,"IV"),
    array(9,"IX"),
    array(58,"LVIII"),
    array(1994,"MCMXCIV"),
);

foreach($test_case as $k => $v) {

    $r = Solution::intToRoman($v[0]);
    print($r." >>> ");
    if ($r == $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
