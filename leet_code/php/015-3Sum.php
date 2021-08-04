<?php
/*
Runtime: 216 ms, faster than 83.58% of PHP online submissions for 3Sum.
Memory Usage: 25 MB, less than 62.69% of PHP online submissions for 3Sum.

testcase 裡 有一組用例是3000組數字的組合
所以正常跑,以PHP來說，幾乎會超時 , 必須優化

        算法解說
        假設array 裡有 8個elem , 
        [ [k1] ,  [k2] ,  [] ,  [] ,  [] ,  [] ,  [] ,  [k3] ]
        [ [k1] ,  [k2] ,  [] ,  [] ,  [] ,  [] ,  [k3] ,  [] ]
        [ [k1] ,  [k2] ,  [] ,  [] ,  [] ,  [k3] ,  [] ,  [] ]
        [ [k1] ,  [k2] ,  [] ,  [] ,  [k3] ,  [] ,  [] ,  [] ]
        [ [k1] ,  [k2] ,  [] ,  [k3] ,  [] ,  [] ,  [] ,  [] ]
        [ [k1] ,  [k2] ,  [k3] ,  [] ,  [] ,  [] ,  [] ,  [] ]
        
        if k2 <= k3  , k2++ , k3 = count($nums)-1
        [ [k1] ,  [] ,  [k2] ,  [] ,  [] ,  [] ,  [] ,  [k3] ]
        [ [k1] ,  [] ,  [k2] ,  [] ,  [] ,  [] ,  [k3] ,  [] ]
        [ [k1] ,  [] ,  [k2] ,  [] ,  [] ,  [k3] ,  [] ,  [] ]
        [ [k1] ,  [] ,  [k2] ,  [] ,  [k3] ,  [] ,  [] ,  [] ]
        [ [k1] ,  [] ,  [k2] ,  [k3] ,  [] ,  [] ,  [] ,  [] ]
        
        if k2 <= k3  , k2++ , k3 = count($nums)-1
        [ [k1] ,  [] ,  [] ,  [k2] ,  [] ,  [] ,  [] ,  [k3] ]
        [ [k1] ,  [] ,  [] ,  [k2] ,  [] ,  [] ,  [k3] ,  [] ]
        [ [k1] ,  [] ,  [] ,  [k2] ,  [] ,  [k3] ,  [] ,  [] ]
        [ [k1] ,  [] ,  [] ,  [k2] ,  [k3] ,  [] ,  [] ,  [] ]
        
        if k2 <= k3  , k2++ , k3 = count($nums)-1
        [ [k1] ,  [] ,  [] ,  [] ,  [k2] ,  [] ,  [] ,  [k3] ]
        [ [k1] ,  [] ,  [] ,  [] ,  [k2] ,  [] ,  [k3] ,  [] ]
        [ [k1] ,  [] ,  [] ,  [] ,  [k2] ,  [k3] ,  [] ,  [] ]
        
        if k2 <= k3  , k2++ , k3 = count($nums)-1
        [ [k1] ,  [] ,  [] ,  [] ,  [] ,  [k2] ,  [] ,  [k3] ]
        [ [k1] ,  [] ,  [] ,  [] ,  [] ,  [k2] ,  [k3] ,  [] ]
        
        if k2 <= k3  , k2++ , k3 = count($nums)-1
        [ [k1] ,  [] ,  [] ,  [] ,  [] ,  [] ,  [k2] ,  [k3] ]

        if k2 == count($nums)-1 , k1++ , k2 = k1+1, k3 = count($nums)-1
        
        ... 直到 k1 > count($nums)-3
        
        
*/
        
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    static function threeSum($nums) {
        // 判斷array 是否超過3個
        if (count($nums) < 3) {
            return [];
        }

        sort($nums);
        $data = [];

        for($i = 0;$i<count($nums)-2;$i++) {
            // 排除重覆值
            if ($i>0 && $nums[$i] == $nums[$i-1]) {
                continue;
            }

            $left = $i+1;
            $right = count($nums)-1;
            $need = 0 - $nums[$i]; 
            
            while ( $left < $right) {
                if ($nums[$left] + $nums[$right] == $need){
                    $data[] = array($nums[$i],$nums[$left],$nums[$right]);
                    
                    // 排除重覆值
                    while ( $left < $right && $nums[$left] == $nums[$left+1]) {
                        $left++;
                    }                    
                    while ( $left < $right && $nums[$right] == $nums[$right-1]) {
                        $right--;
                    }

                    // 匹配到 , 同時位移
                    $left++;
                    $right--;

                } elseif($nums[$left] + $nums[$right] > $need) {
                    $right--;
                } else {
                    $left++;
                }
            }
        }
        return $data;
    }
}

// 測試用例
$test_case = array(
    array([-1,0,1,2,-1,-4],[[-1,-1,2],[-1,0,1]]),
    array([],[]),
    array([0],[]),
    array([-2,-3,0,0,-2],[]),
);

foreach($test_case as $k => $v) {

    $r = Solution::threeSum($v[0]);
    if ($r === $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}