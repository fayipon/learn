<?php
/*
Runtime: 0 ms, faster than 100.00% of PHP online submissions for Letter Combinations of a Phone Number.
Memory Usage: 15.7 MB, less than 43.64% of PHP online submissions for Letter Combinations of a Phone Number.

列出所有組合的地方, 寫法是可以再優化 美觀點的
不過性能上理論不會有太大差異, 就先將就提交上來了

假設每組是3個元素
二位數 所有排列是 3x3 = 9種組合
三位數 是 3x3x3 = 27組
4位則是 3x3x3x3 = 81組

乍看會以為是 平方, 但其實還有0與4個元素的組合

*/
class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    static function letterCombinations($digits) {

        // 0 - 9
        $pad = array("", "", "abc", "def", "ghi", "jkl", "mno", "pqrs", "tuv", "wxyz");

        $nums = str_split($digits);
        $reponse = array();

        if ($digits == "") {
            return $reponse;
        }
        // 只有一個字
        if (count($nums) == 1) {
            $reponse = str_split($pad[$digits]);
            return $reponse;
        }

        foreach ($nums as $k => $v) {
            $tmp[] = str_split($pad[$v]);
        }

        // 列出所有組合
        foreach($tmp[0] as $k1 => $v1) {
            foreach($tmp[1] as $k2 => $v2) {
  
                if (count($tmp) == 2) $reponse[] = $v1.$v2;

                if (isset($tmp[2])) {
                    foreach($tmp[2] as $k3 => $v3) {
                        if (count($tmp) == 3) $reponse[] = $v1.$v2.$v3;
                        
                        if (isset($tmp[3])) {
                            foreach($tmp[3] as $k4 => $v4) {  
                                if (count($tmp) == 4) $reponse[] = $v1.$v2.$v3.$v4;
                            } 
                        }
                    } 
                }
            }       
        }

        return $reponse;
    }


}


// 測試用例
$test_case = array(
    array("23",["ad","ae","af","bd","be","bf","cd","ce","cf"]),
    array("",[]),
    array("2",["a","b","c"]),
    array("234",["adg","adh","adi","aeg","aeh","aei","afg","afh","afi","bdg","bdh","bdi","beg","beh","bei","bfg","bfh","bfi","cdg","cdh","cdi","ceg","ceh","cei","cfg","cfh","cfi"]),
);

foreach($test_case as $k => $v) {

    $r = Solution::letterCombinations($v[0]);
    if ($r === $v[1]) {
        print("用例 ".$k." => PASS\n");
    } else {
        print("用例 ".$k." => FAIL\n");    
    }

}
?>