<?php

class Solution {
    
    /**
     * @param String $s
     * @return String
     */
    static function longestPalindrome($s) {   
        $maxLength = 1;
        $maxStr = '';
        $length = strlen($s);
        if ($length <= 1) {
            return $s;
        } else {
            for($i=0;$i<$length;$i++) {
                for($j = $maxLength; $j<=$length;$j++) {
                    if ($j%2 == 0) {
                        $start = $i - ($j/2);
                    } else {
                        $start = $i - (($j-1)/2);
                    }

                    if ($start < 0) break;
                    
                    $end = $start+$j;
                    if ($end>$length) break;
                    
                    $lastStr = substr($s,$start,$j);
                    if ($lastStr == strrev($lastStr)){
                        $maxStr = $lastStr;
                        $maxLength = $j;
                    } else {
                        if ($maxLength < ($j-1)){
                            break;
                        } else {
                            continue;
                        }
                    }
                }
            }
        }
        return $maxStr;
    }
}

// TESTCASE
$s = "babad";
$s = "cbbd";
$return = Solution::longestPalindrome($s);

var_dump($return);
?>