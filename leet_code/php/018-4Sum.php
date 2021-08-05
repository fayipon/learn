<?php
/*
Runtime: 464 ms, faster than 19.64% of PHP online submissions for 4Sum.
Memory Usage: 15.6 MB, less than 57.14% of PHP online submissions for 4Sum.

*/
class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    static function fourSum($nums, $target) {

        sort($nums);
        $result = [];

        for($i=0;$i<count($nums)-3;$i++) {
            for($j=$i+1;$j<count($nums)-2;$j++) {
                
                $left = $j+1;
                $right = count($nums)-1;

                $tmp = $target - $nums[$i] - $nums[$j];

                while ($left < $right) {

                    $sum = $nums[$left] + $nums[$right];
                    
                    if ($sum == $tmp) {
                        $c = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];
                     
                        $is_save = true;
                        foreach ($result as $k => $v) {
                            if ($v === $c) {
                                $is_save = false;
                            }
                        }

                        if ($is_save) {
                            $result[] = $c;
                        }

                        while ($left > $right && $nums[$left] == $nums[$left+1]) {
                            $left++;
                        }
                    
                        while ($left > $right && $nums[$right] == $nums[$right-1]) {
                            $right--;
                        }
                    
                        // 匹配到 , 同時位移
                        $left++;
                        $right--;
                        
                    } elseif ($tmp < $sum) {
                        $right--;
                    }  else {
                        $left++;
                    }
                }
                
            }   
        }

        return $result;
    }
}


// 測試用例
$test_case = array(
    array([1,0,-1,0,-2,2],0,[[-2,-1,1,2],[-2,0,0,2],[-1,0,0,1]]),
    array([2,2,2,2,2],8,[2,2,2,2]),
);

foreach($test_case as $k => $v) {

    $r = Solution::fourSum($v[0],$v[1]);
    if ($r === $v[2]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
