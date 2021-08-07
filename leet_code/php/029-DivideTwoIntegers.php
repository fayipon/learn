<?php
/*
29. Divide Two Integers
Difficuity : Medium

Runtime: 8 ms, faster than 80.56% of PHP online submissions for Divide Two Integers.
Memory Usage: 15.4 MB, less than 94.44% of PHP online submissions for Divide Two Integers.

p.s 這題規則是 不使用 乘 , 除 , 及 % 等運算
只靠加減來運算

*/
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    static function divide($dividend, $divisor) {

        $INT_MIN = -2147483648;
        $INT_MAX = 2147483647;
        
        if ($dividend == $INT_MIN && $divisor == -1) {
            return $INT_MAX;
        }
        
        $result = 0;
        
        $negatives = 0;
        
        if ($dividend < 0) {
            $dividend = abs($dividend);
            $negatives++;
        }
        
        if ($divisor < 0) {
            $divisor = abs($divisor);
            $negatives++;
        }
        
        $highestDouble = $divisor;
        $highestPowerOfTwo = 1;
        
        while ($dividend >= $highestDouble + $highestDouble) {
            $highestPowerOfTwo += $highestPowerOfTwo;
            $highestDouble += $highestDouble;
        }
        
        while ($dividend >= $divisor) {
            if ($dividend >= $highestDouble) {
                $result += $highestPowerOfTwo;
                $dividend -= $highestDouble;
            }
            
            $highestPowerOfTwo >>= 1;
            $highestDouble >>= 1;
        }
         
        if ($negatives == 1) {
            $result = -$result;
        }
        
        return $result;
    }
}

// 測試用例
$test_case = array(
    array(10,3,3),
    array(7,-3,-2),
    array(0,1,0),
    array(1,1,1),
    array(-1,1,-1),
);

foreach($test_case as $k => $v) {

    $r = Solution::divide($v[0],$v[1]);

    if ($r == $v[2]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}