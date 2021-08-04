<?php
/*
Runtime: 116 ms, faster than 35.71% of PHP online submissions for 3Sum Closest.
Memory Usage: 15.7 MB, less than 76.19% of PHP online submissions for 3Sum Closest.
*/
        
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    static function threeSumClosest($nums, $target) {
        sort($nums);
        $data = array();
        $min_diff = 10000;
        $reponse = 0;
  
        for ($i=0;$i<count($nums);$i++) {
   
            $left = $i+1;
            $right = count($nums)-1;
            
            while ($left < $right) {

                $tmp_sum = $nums[$i] + $nums[$left] + $nums[$right];

                // different 為0 , 直接return 
                if ($tmp_sum == $target) {
                    return $tmp_sum;
                }

                $tmp_diff = abs($tmp_sum - $target);
                if ($tmp_diff < $min_diff) {
                    $min_diff = $tmp_diff;
                    $reponse = $tmp_sum;
                }     

                while ( $left < $right && $nums[$right] == $nums[$right-1]) {
                    $right--;
                }
                
                $right--;
                
                if ($left == $right) {
                    $left++;
                    
                    $right = count($nums)-1;
                }

            }
        }

        return $reponse;
    }
}

// 測試用例
$test_case = array(
    array([-1,2,1,-4],1,2),
);

foreach($test_case as $k => $v) {

    $r = Solution::threeSumClosest($v[0],$v[1]);
    print($r." >>> ");
    if ($r === $v[2]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}