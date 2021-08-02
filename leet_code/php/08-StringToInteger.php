<?php
class Solution {

    /**
    * @param String $s
    * @return Integer
    */
    static function myAtoi($s) { 
        $s = str_split(trim($s));
        $t = "";
        foreach ($s as $k => $v) {
            if (($v == "+") || ($v == "-") || is_numeric($v)) {
                $t .= $v;
            } else {
                break;
            }
        }

        if ($t == "") {
            return 0;
        } else {
            $t = $t+0;
        }

        if ($t > 2147483647) return 2147483647;
        if ($t < -2147483648) return -2147483648;
        return $t;
    }
}

$r = Solution::myAtoi("21474836460");
var_dump($r);
?>