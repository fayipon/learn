<?php
/*

Runtime: 16 ms, faster than 53.33% of PHP online submissions for Regular Expression Matching.
Memory Usage: 15.6 MB, less than 80.00% of PHP online submissions for Regular Expression Matching.

就是DP解法
但總覺得還有更簡單的寫法, 有空時再來研究研究

*/
class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    static function isMatch($s, $p) {

        $tmp_s = str_split($s);
        $tmp_p = str_split($p);

        $len_s = strlen($s);
        $len_p = strlen($p);

        // s,p其一為空時 
        if (($len_s == 0) || ($len_p == 0)) {
            return $len_s == $len_p;
        }

        if ($p == ".*") {
            return true;
        }

        // 沒有 . * 時的處理
        if (!in_array('.',$tmp_p) && !in_array('*',$tmp_p)) {
            return $s == $p;
        }

        $dp = array();
        $dp[0][0] = true;
        for($i = 1; $i < $len_p+1; $i++){
            if ($tmp_p[$i-1] == '*'){
                $dp[0][$i] = @$dp[0][$i-2];
            }
        }

        for ($i=1;$i<=$len_s;$i++) {
            for ($j=1;$j<=$len_p;$j++) {
                if ( ($tmp_s[$i-1] == $tmp_p[$j-1]) || ($tmp_p[$j-1] == '.')) {
                    $dp[$i][$j] = @$dp[$i-1][$j-1];
                } elseif (($tmp_p[$j-1] == '*')) {
                    if ( ($tmp_p[$j-2] == $tmp_s[$i-1]) || ($tmp_p[$j-2] == '.')) {
                        $dp[$i][$j] = (@$dp[$i-1][$j] || @$dp[$i][$j-2]);
                    } else {
                        $dp[$i][$j] = @$dp[$i][$j-2];
                    }
                }
            }   
        }
        
        return @$dp[$len_s][$len_p];
    }
}

// 測試用例
$test_case = array(
    array("aa","a",false),
    array("aa","a*",true),
    array("ab",".*",true),
    array("aab","c*a*b",true),
    array("mississippi","mis*is*p*",false),
    array("ab",".*c",false),
    array("mississippi","mis*is*ip*.",true),
    array("aaa",".*",true),
    array("a","ab*",true),
);

foreach($test_case as $k => $v) {

    $r = Solution::isMatch($v[0],$v[1]);
    if ($r == $v[2]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
