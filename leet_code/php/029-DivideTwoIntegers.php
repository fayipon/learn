<?php
/*
29. Divide Two Integers
Difficuity : Medium

Runtime: 8 ms, faster than 80.56% of PHP online submissions for Divide Two Integers.
Memory Usage: 15.8 MB, less than 16.67% of PHP online submissions for Divide Two Integers.

p.s 這題規則是 不使用 乘 , 除 , 及 % 等運算
只靠加減來運算

這題有幾個有趣的地方

它會傳入一些奇怪的參數
比如 2147483647 , 1
這樣迴圈就要跑2147483647次 , 然後超時

原本硬派解法
到了這邊就完全過不了

只剩偷雞, 但我又想以硬派的方式過這題
所以還在思考思考, 應該有更好的解法

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