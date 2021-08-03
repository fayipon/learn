<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    static function reverse($x) {
        $limit = pow(2,31);
        $t = strrev($x."")+0;
        if ($x < 0) $t = 0-$t;
        if (abs($t) > $limit) $t = 0;
        return $t;
    }
}
?>