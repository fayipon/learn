<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    static function isPalindrome($x) {
        return (strrev($x) == $x);  
    }
}
$x = "121";
$r = Solution::isPalindrome($x);
var_dump($r);
/*
Runtime: 24 ms, faster than 92.70% of PHP online submissions for Palindrome Number.
Memory Usage: 15.7 MB, less than 35.11% of PHP online submissions for Palindrome Number.

看來不是每個人都用了strrev偷懶
*/